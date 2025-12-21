<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;


class ProfileUpdateRequestTest extends TestCase
{
    use RefreshDatabase;



    #[test]
    public function it_requires_unique_email()
    {
        $existingUser = User::factory()->create([
            'email' => 'existing@example.com'
        ]);

        $currentUser = User::factory()->create();

        $data = [
            'name' => 'John Doe',
            'email' => 'existing@example.com', // sama dengan user lain
        ];

        $request = new ProfileUpdateRequest();

        // simulasi $this->user() saat validasi
        $request->setUserResolver(function () use ($currentUser) {
            return $currentUser;
        });

        $validator = Validator::make(
            $data,
            $request->rules()
        );

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('email', $validator->errors()->messages());
    }

   
}
