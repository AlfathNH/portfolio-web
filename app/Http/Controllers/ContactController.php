<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * Handle contact form submission.
     */
    public function send(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'message' => 'required|string|max:2000',
        ]);

        try {
            // Send email (uses MAIL_MAILER from .env — 'log' for dev, SMTP for prod)
            Mail::raw(
                "New message from {$validated['name']} ({$validated['email']}):\n\n{$validated['message']}",
                function ($msg) use ($validated) {
                    $msg->to(config('portfolio.email'))
                        ->subject("Portfolio Contact: Message from {$validated['name']}")
                        ->replyTo($validated['email'], $validated['name']);
                }
            );

            return response()->json([
                'success' => true,
                'message' => "Thanks {$validated['name']}! Your message has been sent. I'll get back to you soon.",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message. Please email directly: ' . config('portfolio.email'),
            ], 500);
        }
    }
}
