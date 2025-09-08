@extends('layouts.admin')
@section('title', 'Edit Profil Sekolah')

@section('content')
<x-page-header
    title="Edit Profil Sekolah"
    :breadcrumb="[
        ['url' => '/dashboard', 'label' => 'Dashboard'],
        ['url' => route('profil.index'), 'label' => 'Profil Sekolah'],
        ['url' => '#', 'label' => 'Edit Data'],
    ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Input Judul --}}
        <div class="mb-4">
    <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
        Judul
    </label>
    <input type="text" name="judul" id="judul"
           value="{{ old('judul', $profil->judul) }}"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                  focus:ring-2 focus:ring-green-500 focus:border-green-500
                  transition duration-200">
    @error('judul')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


        {{-- Input Isi --}}
<div class="mb-4">
    <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">
        Isi
    </label>
    <textarea name="isi" id="isi" rows="5"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                     focus:ring-2 focus:ring-green-500 focus:border-green-500
                     transition duration-200">{{ old('isi', $profil->isi) }}</textarea>
    @error('isi')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Upload Gambar --}}
<div class="mb-4">
    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
        Gambar
    </label>
    <input type="file" name="image" id="image"
           class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                  focus:outline-none focus:ring-2 focus:ring-green-500
                  focus:border-green-500 transition duration-200">

    @if($profil->image)
        <div class="mt-3">
            <p class="text-sm text-gray-600">Gambar saat ini:</p>
            <img src="{{ asset('storage/'.$profil->image) }}"
                 alt="Preview"
                 class="h-32 rounded-lg mt-2 border border-gray-200 shadow-sm">
        </div>
    @endif

    @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
            <a href="{{ route('profil.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</section>
@endsection
