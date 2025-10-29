@extends('layouts.admin')
@section('title', 'User Management')
@section('content')
<x-page-header
    title="Edit User"
    :breadcrumb="[
        ['url' => '/admin/users', 'label' => 'USER MANAGEMENT'],
        ['url' => '', 'label' => 'EDIT USER'],
    ]" />
@php
$title = 'Manajemen User';
$breadcrumb = [
['label' => 'Manajemen User', 'url' => '/admin/users'],
['label' => 'Edit User', 'url' => '']

];
@endphp
<section class="bg-white p-5 rounded-lg shadow">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Nama Pengguna</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role</label>
            <select id="role" name="role" class="w-full px-3 py-2 border rounded-lg" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="tamu" {{ $user->role == 'tamu' ? 'selected' : '' }}>Tamu</option>
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                Update
            </button>
        </div>
    </form>
</section>
@endsection