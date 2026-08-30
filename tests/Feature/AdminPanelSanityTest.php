<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelSanityTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_shows_guide_and_navigation(): void
    {
        $user = User::factory()->admin()->create();

        $html = $this->actingAs($user)->get('/admin')->assertStatus(200)->getContent();

        $this->assertStringContainsString('Panduan Mengelola Website', $html);
        $this->assertStringContainsString('Kelola Konten', $html);
        $this->assertStringContainsString('Jadwal Ibadah & Kegiatan', $html);
    }

    public function test_non_admin_user_cannot_access_admin_panel(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get('/admin')
            ->assertForbidden();
    }

    public function test_admin_resource_lists_render(): void
    {
        $user = User::factory()->admin()->create();

        foreach (['schedules', 'news', 'galleries', 'contact-messages'] as $uri) {
            $this->actingAs($user)
                ->get("/admin/{$uri}")
                ->assertStatus(200);
        }
    }
}