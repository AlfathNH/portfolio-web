"""
Portfolio AI Microservice — GitHub Stats Router
Handles GET /github/stats and GET /github/repo/{slug} endpoints.
"""

from fastapi import APIRouter
from services.github_service import get_github_profile_stats, get_repo_stats

router = APIRouter(prefix="/github", tags=["github"])


@router.get("/stats")
async def github_stats():
    """
    GET /github/stats
    Returns public GitHub profile statistics for the portfolio owner.
    Cached for 1 hour to avoid rate limiting.
    """
    return await get_github_profile_stats()


@router.get("/repo/{slug}")
async def github_repo_stats(slug: str):
    """
    GET /github/repo/{slug}
    Returns stars, forks, and other stats for a specific project repository.
    Maps portfolio slugs to GitHub repo paths.
    """
    return await get_repo_stats(slug)
