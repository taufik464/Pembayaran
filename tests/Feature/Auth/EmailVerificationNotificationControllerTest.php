<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;

class EmailVerificationNotificationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_if_email_is_already_verified()
    {
        // Buat user yang emailnya sudah terverifikasi
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        // Login sebagai user
        $response = $this->actingAs($user)->post('/email/verification-notification');

        // Pastikan redirect ke dashboard
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    /** @test */
    public function it_sends_verification_email_if_not_verified()
    {
        // Fake notification
        Notification::fake();

        // Buat user yang BELUM terverifikasi
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Login sebagai user
        $response = $this->actingAs($user)->post('/email/verification-notification');

        // Pastikan notifikasi terkirim
        Notification::assertSentTo($user, VerifyEmail::class);

        // Pastikan kembali dengan session status yang benar
        $response->assertSessionHas('status', 'verification-link-sent');
    }
}
