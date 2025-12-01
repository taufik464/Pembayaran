@extends('layouts.admin')
@section('title', 'User Management')
@section('content')
@php
$title = 'Manajemen User';
$breadcrumb = [
['label' => 'Manajemen User', 'url' => '/admin/users'],

];
@endphp

<section class="bg-white mt-12 p-5 rounded-lg shadow">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Nama Pengguna</label>
            <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                Simpan
            </button>
        </div>
    </form>
</section>
@endsection