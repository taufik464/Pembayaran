<?php

namespace Tests\Feature\Middleware;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class EnsureTokenIsValidRoleTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function superadmin_bisa_mengakses_route()
    {
        $user = User::factory()->create([
            'role' => 'superadmin'
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
       
    }

    #[Test]
    public function staff_bisa_mengakses_route()
    {
        $user = User::factory()->create([
            'role' => 'staff'
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
       
    }

  

    #[Test]
    public function user_tanpa_login_tidak_bisa_mengakses()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }
}
