"""
Portfolio AI Microservice — GitHub Stats Service
Fetches public GitHub profile and repository statistics.
"""

import os
import time
from typing import Optional

import httpx
from cachetools import TTLCache

# ── Cache (1 hour TTL) ─────────────────────────────────────────────────────────
_cache = TTLCache(maxsize=100, ttl=3600)

GITHUB_USERNAME = os.getenv("GITHUB_USERNAME", "AlfathNH")
GITHUB_TOKEN    = os.getenv("GITHUB_TOKEN", "")

REPO_SLUG_MAP = {
    "ostrich-smart-hub": "AlfathNH/Project-2-Ostrich-Smart-Hub",
    "vertex-logistics-concept": "AlfathNH/Vertex-Logistics-UIUX-Concept",
    "pasar-kalijati-system": "AlfathNH/Project-1-Sistem-Retribusi-Pasar-Desa-Kalijati-Timur-Berbasis-Excel",
    "memecam-virtual-camera": "AlfathNH/Meme-Reaction-Virtual-Camera.",
}


def _get_headers() -> dict:
    """GitHub API headers with optional auth token."""
    headers = {
        "Accept": "application/vnd.github.v3+json",
        "User-Agent": "portfolio-ai-service/1.0",
    }
    if GITHUB_TOKEN:
        headers["Authorization"] = f"Bearer {GITHUB_TOKEN}"
    return headers


async def get_github_profile_stats() -> dict:
    """
    Fetch public profile stats for the portfolio owner.
    Returns followers, following, public_repos, avatar_url.
    """
    cache_key = f"github_profile_{GITHUB_USERNAME}"
    if cache_key in _cache:
        return _cache[cache_key]

    try:
        async with httpx.AsyncClient(timeout=10.0) as client:
            response = await client.get(
                f"https://api.github.com/users/{GITHUB_USERNAME}",
                headers=_get_headers(),
            )
            response.raise_for_status()
            data = response.json()

            result = {
                "username": data.get("login"),
                "name": data.get("name"),
                "avatar_url": data.get("avatar_url"),
                "bio": data.get("bio"),
                "public_repos": data.get("public_repos", 0),
                "followers": data.get("followers", 0),
                "following": data.get("following", 0),
                "profile_url": data.get("html_url"),
                "cached_at": time.time(),
            }
            _cache[cache_key] = result
            return result

    except Exception as e:
        return {
            "error": f"Failed to fetch GitHub stats: {str(e)}",
            "username": GITHUB_USERNAME,
            "profile_url": f"https://github.com/{GITHUB_USERNAME}",
        }


async def get_repo_stats(slug: str) -> dict:
    """
    Fetch stats for a specific repository by portfolio slug.
    Returns stars, forks, language, last_updated.
    """
    cache_key = f"github_repo_{slug}"
    if cache_key in _cache:
        return _cache[cache_key]

    # Map portfolio slug to GitHub repo path
    repo_path = REPO_SLUG_MAP.get(slug)
    if not repo_path:
        return {"error": f"Unknown project slug: {slug}"}

    try:
        async with httpx.AsyncClient(timeout=10.0) as client:
            response = await client.get(
                f"https://api.github.com/repos/{repo_path}",
                headers=_get_headers(),
            )
            response.raise_for_status()
            data = response.json()

            result = {
                "slug": slug,
                "repo": repo_path,
                "stars": data.get("stargazers_count", 0),
                "forks": data.get("forks_count", 0),
                "watchers": data.get("watchers_count", 0),
                "language": data.get("language"),
                "open_issues": data.get("open_issues_count", 0),
                "last_updated": data.get("updated_at"),
                "description": data.get("description"),
                "html_url": data.get("html_url"),
                "cached_at": time.time(),
            }
            _cache[cache_key] = result
            return result

    except httpx.HTTPStatusError as e:
        if e.response.status_code == 404:
            return {"error": "Repository not found or is private", "slug": slug}
        return {"error": f"GitHub API error: {e.response.status_code}", "slug": slug}

    except Exception as e:
        return {"error": f"Failed to fetch repo stats: {str(e)}", "slug": slug}
