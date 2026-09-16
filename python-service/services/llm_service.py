"""
Portfolio AI Microservice — LLM Service
Handles communication with Google Gemini API for portfolio Q&A chatbot.
"""

import json
import os
from pathlib import Path
from typing import Optional

import google.generativeai as genai
from dotenv import load_dotenv

load_dotenv()

# ── Load Portfolio Context ─────────────────────────────────────────────────────
def _load_portfolio_context() -> dict:
    """Load the portfolio knowledge base JSON file."""
    context_file = os.getenv("PORTFOLIO_CONTEXT_FILE", "data/portfolio_context.json")
    context_path = Path(__file__).parent.parent / context_file

    if context_path.exists():
        with open(context_path, "r", encoding="utf-8") as f:
            return json.load(f)
    return {}

_PORTFOLIO_CONTEXT = _load_portfolio_context()


def _build_system_prompt(context: dict) -> str:
    """Build the system prompt from portfolio context."""
    owner = context.get("owner", "Alfath Noorislami Herawansyah")
    availability = context.get("availability", "Open to opportunities")
    bio = context.get("bio", "")

    # Build projects summary
    projects = context.get("projects", [])
    projects_text = "\n".join([
        f"- {p['title']}: {p['description'][:120]}... Tech: {', '.join(p['tech_stack'])}"
        for p in projects
    ])

    # Build skills summary
    skills_data = context.get("skills", {})
    skills_text = ""
    for cat, data in skills_data.items():
        names = [item["name"] for item in data.get("items", [])]
        skills_text += f"{cat.capitalize()}: {', '.join(names)}\n"

    # Build FAQ
    faq = context.get("faq", [])
    faq_text = "\n".join([f"Q: {item['q']}\nA: {item['a']}" for item in faq])

    system_prompt = f"""You are an AI assistant for {owner}'s portfolio website. Your role is to help recruiters, clients, and visitors learn about {owner}.

## About {owner}:
{bio}
Location: {context.get('location', 'Subang, Indonesia')}
Availability: {availability}

## Featured Projects:
{projects_text}

## Skills:
{skills_text}

## Contact:
Email: {context.get('contact', {}).get('email', '')}
GitHub: {context.get('contact', {}).get('github', '')}

## Frequently Asked Questions:
{faq_text}

## Instructions:
- Answer in the same language as the question (Indonesian or English)
- Be helpful, concise, and enthusiastic about {owner}'s work
- Always encourage reaching out directly for project discussions
- If asked about topics outside this portfolio context, politely redirect
- Keep responses under 200 words unless more detail is specifically requested
- Use a friendly, professional tone
"""
    return system_prompt


# ── Gemini Client Setup ────────────────────────────────────────────────────────
def _get_gemini_model():
    """Initialize Gemini model with portfolio system prompt."""
    api_key = os.getenv("GEMINI_API_KEY")
    if not api_key:
        return None

    genai.configure(api_key=api_key)

    system_prompt = _build_system_prompt(_PORTFOLIO_CONTEXT)

    model = genai.GenerativeModel(
        model_name="gemini-1.5-flash",
        system_instruction=system_prompt,
        generation_config=genai.GenerationConfig(
            temperature=0.7,
            max_output_tokens=300,
            top_p=0.9,
        )
    )
    return model


# ── Main Chat Function ─────────────────────────────────────────────────────────
async def get_chat_response(
    message: str,
    chat_history: Optional[list] = None,
) -> str:
    """
    Send a message to Gemini and get a response.
    Falls back to a static FAQ lookup if Gemini is unavailable.
    """
    # Try Gemini first
    api_key = os.getenv("GEMINI_API_KEY")
    if api_key:
        try:
            model = _get_gemini_model()
            if model:
                # Build conversation history for Gemini
                history = []
                if chat_history:
                    for msg in chat_history[-6:]:  # Last 3 exchanges
                        role = "user" if msg["role"] == "user" else "model"
                        history.append({"role": role, "parts": [msg["text"]]})

                chat = model.start_chat(history=history)
                response = await chat.send_message_async(message)
                return response.text.strip()

        except Exception as e:
            print(f"[LLM] Gemini error: {e}")

    # Fallback: static FAQ lookup
    return _fallback_response(message)


def _fallback_response(message: str) -> str:
    """Simple keyword-based fallback when Gemini is unavailable."""
    msg_lower = message.lower()
    faq = _PORTFOLIO_CONTEXT.get("faq", [])

    # Try to match FAQ
    for item in faq:
        keywords = item["q"].lower().split()
        if any(kw in msg_lower for kw in keywords if len(kw) > 3):
            return item["a"]

    # Generic fallback
    contact = _PORTFOLIO_CONTEXT.get("contact", {})
    owner = _PORTFOLIO_CONTEXT.get("owner", "Alfath")
    email = contact.get("email", "alfathnoor11@gmail.com")
    github = contact.get("github", "https://github.com/AlfathNH")

    return (
        f"Hi! I'm {owner}'s portfolio assistant. "
        f"For detailed questions, please reach out directly: "
        f"📧 {email} | 💻 {github}"
    )
