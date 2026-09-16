<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Skill;
use App\Models\TimelineEntry;
use Database\Seeders\PortfolioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
    }

    public function test_portfolio_page_loads_with_seeded_data(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Alfath Noorislami Herawansyah');
        $response->assertSee('Politeknik Negeri Subang');
        $response->assertSee('Ostrich Smart Hub');
        $response->assertSee('Vertex Logistics');
    }

    public function test_contact_form_submission_success(): void
    {
        Mail::fake();

        $response = $this->postJson('/contact', [
            'name' => 'Recruiter John',
            'email' => 'john@example.com',
            'message' => 'Hello Alfath, we love your portfolio!',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_contact_form_validation_errors(): void
    {
        $response = $this->postJson('/contact', [
            'name' => '',
            'email' => 'not-an-email',
            'message' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'email', 'message']);
    }

    public function test_ai_proxy_chat_mocked_success(): void
    {
        Http::fake([
            '*' => Http::response([
                'response' => 'Halo! Saya asisten AI Alfath.',
                'model' => 'gemini-1.5-flash',
            ], 200),
        ]);

        $response = $this->postJson('/api/chat', [
            'message' => 'Halo Alfath!',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'response' => 'Halo! Saya asisten AI Alfath.',
        ]);
    }

    public function test_ai_proxy_chat_fallback_when_service_down(): void
    {
        Http::fake([
            '*' => Http::response(null, 500),
        ]);

        $response = $this->postJson('/api/chat', [
            'message' => 'Halo Alfath!',
        ]);

        $response->assertStatus(200);
        $this->assertStringContainsString('alfathnoor11@gmail.com', $response->json('response'));
    }
}
