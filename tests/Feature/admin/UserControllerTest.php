<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat user admin untuk login
        $this->admin = User::factory()->create([
            'role' => 'superadmin'
        ]);
    }

    /** @test */
    public function index_page_can_be_loaded()
    {
        $response = $this->actingAs($this->admin)
            ->get(route('admin.users'));

        $response->assertStatus(200)
            ->assertViewIs('admin.users.index')
            ->assertViewHas('user');
    }

    /** @test */
    public function create_page_can_be_loaded()
    {
        $response = $this->actingAs($this->admin)
            ->get(route('admin.users.create'));

        $response->assertStatus(200)
            ->assertViewIs('admin.users.create');
    }

    /** @test */
    public function it_can_store_user()
    {
        $response = $this->actingAs($this->admin)
            ->post(route('admin.users.store'), [
                'username' => 'testuser',
                'email' => 'testuser@example.com',
            ]);

        $this->assertDatabaseHas('users', [
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            
        ]);

        $user = User::where('email', 'testuser@example.com')->first();
        $this->assertTrue(Hash::check('testuser', $user->password)); // password di-hash dari username

        $response->assertRedirect(route('admin.users'));
    }

    /** @test */
    public function edit_page_can_be_loaded()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)
            ->get(route('admin.users.edit', $user->id));

        $response->assertStatus(200)
            ->assertViewIs('admin.users.edit')
            ->assertViewHas('user', function ($viewUser) use ($user) {
                return $viewUser->id === $user->id;
            });
    }

    /** @test */
    public function it_can_update_user()
    {
        $user = User::factory()->create([
            'role' => 'staff'
        ]);

        $response = $this->actingAs($this->admin)
            ->put(route('admin.users.update', $user->id), [
                'username' => 'updateduser',
                'email' => 'updated@example.com',
                'role' => 'staff',
            ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'updateduser',
            'email' => 'updated@example.com',
            'role' => 'staff',
        ]);

        $response->assertRedirect(route('admin.users'));
    }
}
