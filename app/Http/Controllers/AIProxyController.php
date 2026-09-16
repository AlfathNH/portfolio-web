<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIProxyController extends Controller
{
    /**
     * Forward chat message to Python AI microservice.
     */
    public function chat(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        if (!config('portfolio.chatbot_enabled')) {
            return response()->json([
                'response' => 'AI Assistant is currently unavailable. Please contact Alfath directly at alfathnoor11@gmail.com',
            ]);
        }

        $aiServiceUrl = config('portfolio.ai_service_url');
        $timeout      = config('portfolio.ai_service_timeout', 30);

        try {
            $response = Http::timeout($timeout)
                ->post("{$aiServiceUrl}/chat", [
                    'message'    => $request->input('message'),
                    'session_id' => session()->getId(),
                ]);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            Log::warning('AI service returned error', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            return response()->json([
                'response' => 'I apologize, I\'m having trouble connecting right now. You can reach Alfath directly at alfathnoor11@gmail.com',
            ]);

        } catch (\Exception $e) {
            Log::error('AI service connection failed', ['error' => $e->getMessage()]);

            return response()->json([
                'response' => 'AI service is temporarily unavailable. Please try again later or contact Alfath directly!',
            ]);
        }
    }

    /**
     * Get GitHub stats for the portfolio owner.
     */
    public function githubStats(): JsonResponse
    {
        if (!config('portfolio.github_stats_enabled')) {
            return response()->json(['error' => 'GitHub stats disabled'], 503);
        }

        $aiServiceUrl = config('portfolio.ai_service_url');

        try {
            $response = Http::timeout(10)->get("{$aiServiceUrl}/github/stats");

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json(['error' => 'Failed to fetch GitHub stats'], 503);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Service unavailable'], 503);
        }
    }

    /**
     * Get GitHub stats for a specific repo.
     */
    public function githubRepo(string $slug): JsonResponse
    {
        $aiServiceUrl = config('portfolio.ai_service_url');

        try {
            $response = Http::timeout(10)->get("{$aiServiceUrl}/github/repo/{$slug}");

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json(['error' => 'Repo not found'], 404);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Service unavailable'], 503);
        }
    }
}
