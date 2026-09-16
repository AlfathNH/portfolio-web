"""
Portfolio AI Microservice — Main Entry Point
FastAPI application for AI chatbot and GitHub stats.
"""

import os
from contextlib import asynccontextmanager

from dotenv import load_dotenv
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from fastapi.responses import JSONResponse

from routers import chatbot, github_stats

load_dotenv()

# ── Lifespan ──────────────────────────────────────────────────────────────────
@asynccontextmanager
async def lifespan(app: FastAPI):
    print("🚀 Portfolio AI Microservice starting...")
    print(f"   Gemini API: {'✅ Configured' if os.getenv('GEMINI_API_KEY') else '⚠️  Not configured (fallback mode)'}")
    print(f"   GitHub Token: {'✅ Set' if os.getenv('GITHUB_TOKEN') else '⚠️  Not set (anonymous access)'}")
    yield
    print("🛑 Portfolio AI Microservice shutting down.")


# ── FastAPI App ───────────────────────────────────────────────────────────────
app = FastAPI(
    title="Portfolio AI Microservice",
    description="AI-powered chatbot and GitHub stats service for Alfath Noorislami's portfolio",
    version="1.0.0",
    lifespan=lifespan,
    docs_url="/docs",
    redoc_url="/redoc",
)

# ── CORS ──────────────────────────────────────────────────────────────────────
# Allow Laravel app to call this service
allowed_origins = [
    "http://localhost:8000",
    "http://127.0.0.1:8000",
    "http://localhost",
    os.getenv("LARAVEL_APP_URL", ""),
]

app.add_middleware(
    CORSMiddleware,
    allow_origins=[o for o in allowed_origins if o],
    allow_credentials=True,
    allow_methods=["GET", "POST"],
    allow_headers=["*"],
)


# ── Routes ────────────────────────────────────────────────────────────────────
app.include_router(chatbot.router)
app.include_router(github_stats.router)


@app.get("/", tags=["health"])
async def root():
    """Health check endpoint."""
    return JSONResponse({
        "service": "Portfolio AI Microservice",
        "owner": "Alfath Noorislami Herawansyah",
        "status": "running",
        "version": "1.0.0",
        "endpoints": {
            "chat": "POST /chat",
            "github_stats": "GET /github/stats",
            "github_repo": "GET /github/repo/{slug}",
        }
    })


@app.get("/health", tags=["health"])
async def health():
    """Health check for deployment monitoring."""
    return {"status": "ok"}


# ── Run directly ──────────────────────────────────────────────────────────────
if __name__ == "__main__":
    import uvicorn
    uvicorn.run(
        "main:app",
        host="0.0.0.0",
        port=8001,
        reload=True,
        log_level="info",
    )
