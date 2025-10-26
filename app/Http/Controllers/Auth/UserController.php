<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = user::all();
        return view('admin.users.index', compact('user'));
        
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if (User::where('email', $validated['email'])->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email sudah terdaftar.'])->withInput();
        }

        // Buat user baru terlebih dahulu
        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($request->username),
            'role' => 'tamu', // Atur role sesuai kebutuhan
        ]);

        $resetpassword = new PasswordResetLinkController();
        $resetpassword->store(new Request(['email' => $user->email]));
        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan dan link reset password telah dikirimkan ke email.');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:superadmin,staff,pengunjung',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui.');
    }
    
}
