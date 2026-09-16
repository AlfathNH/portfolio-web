"""
Portfolio AI Microservice — Chatbot Router
Handles POST /chat endpoint with rate limiting and session tracking.
"""

from collections import defaultdict
from datetime import datetime, timedelta, timezone
from typing import List, Optional

from fastapi import APIRouter, HTTPException, Request
from pydantic import BaseModel, Field

from services.llm_service import get_chat_response

router = APIRouter(prefix="/chat", tags=["chatbot"])

# ── Simple in-memory rate limiting ────────────────────────────────────────────
_session_message_counts: dict[str, dict] = defaultdict(lambda: {"count": 0, "reset_at": None})
MAX_MESSAGES_PER_SESSION = 20
SESSION_WINDOW_MINUTES = 60


def _check_rate_limit(session_id: str) -> bool:
    """Returns True if the session is within rate limits."""
    now = datetime.now(timezone.utc)
    session = _session_message_counts[session_id]

    # Reset if window expired
    if session["reset_at"] and now > session["reset_at"]:
        session["count"] = 0
        session["reset_at"] = None

    if session["count"] >= MAX_MESSAGES_PER_SESSION:
        return False

    session["count"] += 1
    if not session["reset_at"]:
        session["reset_at"] = now + timedelta(minutes=SESSION_WINDOW_MINUTES)

    return True


# ── Request / Response Schemas ─────────────────────────────────────────────────
class ChatMessage(BaseModel):
    role: str  # "user" | "ai"
    text: str


class ChatRequest(BaseModel):
    message: str = Field(..., min_length=1, max_length=600)
    session_id: Optional[str] = "anonymous"
    history: Optional[List[ChatMessage]] = []


class ChatResponse(BaseModel):
    response: str
    session_id: str


# ── Endpoint ───────────────────────────────────────────────────────────────────
@router.post("", response_model=ChatResponse)
async def chat(request: ChatRequest):
    """
    POST /chat
    Accepts a user message and returns an AI-generated response
    using the portfolio knowledge base as context.
    """
    session_id = request.session_id or "anonymous"

    # Rate limit check
    if not _check_rate_limit(session_id):
        raise HTTPException(
            status_code=429,
            detail="Message limit reached. Please contact Alfath directly at alfathnoor11@gmail.com"
        )

    # Convert history to dict format for LLM service
    history = [{"role": m.role, "text": m.text} for m in (request.history or [])]

    # Get AI response
    response_text = await get_chat_response(
        message=request.message,
        chat_history=history,
    )

    return ChatResponse(response=response_text, session_id=session_id)
