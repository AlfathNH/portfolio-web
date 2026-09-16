"""
Unit tests for Portfolio AI Microservice.
"""

from fastapi.testclient import TestClient
import pytest
from main import app

client = TestClient(app)


def test_root_endpoint():
    response = client.get("/")
    assert response.status_code == 200
    data = response.json()
    assert data["service"] == "Portfolio AI Microservice"
    assert data["status"] == "running"


def test_health_endpoint():
    response = client.get("/health")
    assert response.status_code == 200
    assert response.json() == {"status": "ok"}


def test_chat_endpoint_fallback():
    response = client.post(
        "/chat",
        json={"message": "Apa proyek terbaik Alfath?", "session_id": "test_session"},
    )
    assert response.status_code == 200
    data = response.json()
    assert "response" in data
    assert len(data["response"]) > 0
    assert data["session_id"] == "test_session"


def test_chat_endpoint_rate_limit():
    # Make requests up to the limit
    session_id = "rate_limit_test_session"
    for _ in range(20):
        client.post("/chat", json={"message": "test", "session_id": session_id})

    # The 21st request should be rate limited (429)
    response = client.post("/chat", json={"message": "test", "session_id": session_id})
    assert response.status_code == 429
