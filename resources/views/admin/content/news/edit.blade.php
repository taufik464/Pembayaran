@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
<x-page-header
    title="Edit Berita"
    :breadcrumb="[
        ['url' => '/dashboard', 'label' => 'Dashboard'],
        ['url' => route('admin.news'), 'label' => 'Berita'],
        ['url' => '#', 'label' => 'Edit Data'],
    ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <form action="{{ route('admin.news.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Input Judul --}}
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                Judul Berita
            </label>
            <input type="text" name="judul" id="judul"
                   value="{{ old('judul', $berita->judul) }}"
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
                Isi Berita
            </label>
            <textarea name="isi" id="isi" rows="6"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                             focus:ring-2 focus:ring-green-500 focus:border-green-500
                             transition duration-200">{{ old('isi', $berita->konten) }}</textarea>
            @error('isi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Penulis --}}
        <div class="mb-4">
            <label for="penulis" class="block text-sm font-medium text-gray-700 mb-2">
                Penulis
            </label>
            <input type="text" name="penulis" id="penulis"
                   value="{{ old('penulis', $berita->penulis) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                          focus:ring-2 focus:ring-green-500 focus:border-green-500
                          transition duration-200">
            @error('penulis')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Upload Gambar --}}
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                Gambar Berita
            </label>
            <input type="file" name="gambar" id="gambar"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                          focus:outline-none focus:ring-2 focus:ring-green-500
                          focus:border-green-500 transition duration-200">

            @if($berita->gambar)
                <div class="mt-3">
                    <p class="text-sm text-gray-600">Gambar saat ini:</p>
                    <img src="{{ asset('storage/'.$berita->gambar) }}"
                         alt="Preview"
                         class="h-32 rounded-lg mt-2 border border-gray-200 shadow-sm">
                </div>
            @endif

            @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.news') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</section>
@endsection
