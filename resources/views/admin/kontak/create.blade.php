@extends('layouts.admin')
@section('title', 'Tambah Kontak')
@section('content')
<x-page-header
    title="Tambah Kontak"
    :breadcrumb="[
            ['url' => '/admin/kontak', 'label' => 'Kontak'],
            ['url' => '/admin/kontak/create', 'label' => 'Tambah Kontak'],
        ]" />
<section class="bg-white p-5 rounded-lg shadow">
    <form action="{{ route('admin.kontak.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama:</label>
            <input type="text" id="nama" name="nama" class="w-full p-2 border border-gray-300 rounded"
                value="{{ old('nama') }}" required>
            @error('nama')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="nomor" class="block text-gray-700 font-bold mb-2">Nomor:</label>
            <input type="text" id="nomor" name="nomor" class="w-full p-2 border border-gray-300 rounded"
                value="{{ old('nomor') }}">
            @error('nomor')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="link" class="block text-gray-700 font-bold mb-2">Link:</label>
            <input type="text" id="link" name="link" class="w-full p-2 border border-gray-300 rounded"
                value="{{ old('link') }}">
            @error('link')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Gambar (opsional):</label>
            <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded">
            @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.kontak') }}"
                class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Simpan</button>
        </div>
    </form>
</section>
@endsection