<?php

namespace Tests\Feature;

use App\Models\User;
use App\Support\HtmlSanitizer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_security_headers_are_present(): void
    {
        $response = $this->get('/');

        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Content-Security-Policy');

        $csp = $response->headers->get('Content-Security-Policy');
        $this->assertStringContainsString("object-src 'none'", $csp);
        $this->assertStringContainsString("frame-ancestors 'self'", $csp);
        $this->assertStringContainsString('frame-src https://www.google.com', $csp);
    }

    public function test_404_renders_branded_page(): void
    {
        $this->get('/halaman-tidak-ada')
            ->assertStatus(404)
            ->assertSee('Halaman Tidak Ditemukan');
    }

    public function test_non_admin_gets_branded_forbidden_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin')
            ->assertStatus(403)
            ->assertSee('Akses Ditolak');
    }

    public function test_admin_profile_page_requires_admin_role(): void
    {
        $user = User::factory()->admin()->create();

        $this->actingAs($user)
            ->get('/admin/profile')
            ->assertStatus(200);
    }

    public function test_contact_submission_is_rate_limited(): void
    {
        $payload = [
            'name' => 'Pengunjung',
            'email' => 'tamu@contoh.id',
            'subject' => 'info_umum',
            'message' => 'Halo, saya ingin bertanya mengenai jadwal ibadah minggu ini.',
            'consent' => '1',
        ];

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('contact.store'), $payload);
        }

        $this->post(route('contact.store'), $payload)
            ->assertStatus(429);
    }

    public function test_html_sanitizer_strips_injection(): void
    {
        $dirty = '<script>alert(1)</script><p onclick="x()">Teks <strong>aman</strong></p>'
            .'<a href="javascript:alert(1)">klik</a>'
            .'<iframe src="https://evil.test"></iframe>';

        $clean = HtmlSanitizer::sanitize($dirty);

        $this->assertStringNotContainsString('script', $clean);
        $this->assertStringNotContainsString('javascript:', $clean);
        $this->assertStringNotContainsString('iframe', $clean);
        $this->assertStringNotContainsString('onclick', $clean);
        $this->assertStringContainsString('<strong>aman</strong>', $clean);
    }

    public function test_news_article_content_is_sanitized_on_output(): void
    {
        $news = \App\Models\News::factory()->create([
            'content' => '<p>Ringkasan</p><script>alert(1)</script>',
            'published_at' => now(),
            'is_published' => true,
        ]);

        $this->get(route('news.show', $news->slug))
            ->assertStatus(200)
            ->assertSee('<p>Ringkasan</p>', false)
            ->assertDontSee('<script>', false);
    }
}