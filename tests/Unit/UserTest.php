<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_check_if_user_is_superadmin()
    {
        $user = User::factory()->create([
            'role' => 'superadmin'
        ]);

        $this->assertTrue($user->isSuperadmin());
        $this->assertFalse($user->isStaff());
    }

    /** @test */
    public function it_can_check_if_user_is_staff()
    {
        $user = User::factory()->create([
            'role' => 'staff'
        ]);

        $this->assertTrue($user->isStaff());
        $this->assertFalse($user->isSuperadmin());
    }

    /** @test */
    public function it_maps_name_attribute_to_username()
    {
        $user = User::factory()->create([
            'username' => 'john_doe'
        ]);

        // getNameAttribute
        $this->assertEquals('john_doe', $user->name);

        // setNameAttribute
        $user->name = 'jane_doe';
        $this->assertEquals('jane_doe', $user->username);
    }
}
