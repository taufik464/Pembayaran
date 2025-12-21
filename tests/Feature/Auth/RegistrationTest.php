<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});


use App\Models\User;
test(
    'tidak bisa masuk halaman users jika bukan superadmin',
    function () {
        $user = User::create([
            'username' => 'ilfan',
            'email' => 'ilfan@example.com',
            'password' => bcrypt('password'),
            'role' => 'staff'
        ]);
        // ✅ Login sebagai user biasa
        $this->actingAs($user);
        // ✅ Coba akses halaman users
        $response = $this->get('/admin/users');
        // ✅ Pastikan mendapat status 403 Forbidden
        $response->assertStatus(403);
        });



/*
test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});*/
