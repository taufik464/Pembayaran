@extends('layouts.admin')
@section('title', 'Ekstrakurikuler')
@section('content')
<x-page-header
    title="Tambah Ekstrakurikuler"
    :breadcrumb="[
            ['url' => '/dashboard', 'label' => 'Dashboard'],
            ['url' => '/admin/ekstrakurikuler', 'label' => 'Ekstrakurikuler'],
        ]" />



<section class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Judul</label>
            <input type="text" name="nama" class="w-full border rounded p-2" required value="{{ old('nama') }}">
            @error('nama')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Isi</label>
            <textarea name="deskripsi" rows="4" class="w-full border rounded p-2" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Pembina</label>
            <input type="text" name="pembina" class="w-full border rounded p-2" required value="{{ old('pembina') }}">
            @error('pembina')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Jadwal</label>
            <input type="text" name="jadwal" class="w-full border rounded p-2" required value="{{ old('jadwal') }}">
            @error('jadwal')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Gambar</label>
            <input type="file" name="gambar" class="w-full border rounded p-2">
            @error('gambar')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-3">
            <button type="submit"
                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                Simpan
            </button>
            <a href="{{ route('admin.ekstrakurikuler') }}"
                class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">
                Batal
            </a>
        </div>
    </form>
</section>
@endsection