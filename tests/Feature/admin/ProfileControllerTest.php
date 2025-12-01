<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

 #[Test]
    public function it_can_show_user_profile()
    {
        // Buat user palsu
        $user = User::factory()->create( ['role' => 'superadmin'] );

        // Login sebagai user tersebut
        $response = $this->actingAs($user)->get('/profile');

        // Pastikan halaman terbuka
        $response->assertStatus(200);

        // Pastikan view yang dipanggil benar
        $response->assertViewIs('admin.profile.show');

        // Pastikan data user dikirim ke view
        $response->assertViewHas('user', function ($viewUser) use ($user) {
            return $viewUser->id === $user->id;
        });
    }

    

   
}
