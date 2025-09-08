@extends('layouts.admin')
@section('title', 'Ekstrakurikuler')
@section('content')
<x-page-header
    title="Edit Ekstrakurikuler"
    :breadcrumb="[
            ['url' => '/dashboard', 'label' => 'Dashboard'],
            ['url' => '/admin/ekstrakurikuler', 'label' => 'Ekstrakurikuler'],
        ]" />



<section class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.ekstrakurikuler.update', $ekstra->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-medium">Judul</label>
            <input type="text" name="nama" class="w-full border rounded p-2" required value="{{ old('nama', $ekstra->nama ?? '') }}">
            @error('nama')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Isi</label>
            <textarea name="deskripsi" rows="4" class="w-full border rounded p-2" required>{{ old('deskripsi', $ekstra->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Pembina</label>
            <input type="text" name="pembina" class="w-full border rounded p-2" required value="{{ old('pembina', $ekstra->pembina ?? '') }}">
            @error('pembina')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Jadwal</label>
            <input type="text" name="jadwal" class="w-full border rounded p-2" required value="{{ old('jadwal', $ekstra->jadwal ?? '') }}">
            @error('jadwal')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                Gambar
            </label>
            <input type="file" name="gambar" id="gambar"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                  focus:outline-none focus:ring-2 focus:ring-green-500
                  focus:border-green-500 transition duration-200">

            @if($ekstra->gambar)
            <div class="mt-3">
                <p class="text-sm text-gray-600">Gambar saat ini:</p>
                <img src="{{ asset('storage/'.$ekstra->gambar) }}"
                    alt="Preview"
                    class="h-32 rounded-lg mt-2 border border-gray-200 shadow-sm">
            </div>
            @endif

            @error('gambar')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
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