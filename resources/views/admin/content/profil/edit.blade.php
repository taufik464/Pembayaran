@extends('layouts.admin')
@section('title', 'Edit Profil Sekolah')
@php
$title = 'Edit Profil Sekolah';
$breadcrumb = [
['label' => 'Profil Sekolah', 'url' => route('profil.index')],
['label' => 'Edit Data', 'url' => '#']
];
@endphp
@section('content')


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

        {{-- Select Kategori --}}
        <div class="mb-4">
            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                Kategori
            </label>
            <select name="kategori" id="kategori"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                   focus:ring-2 focus:ring-green-500 focus:border-green-500
                   transition duration-200">
                <option value="" disabled {{ old('kategori', $profil->kategori) ? '' : 'selected' }}>Pilih Kategori</option>
                <option value="Sambutan" {{ old('kategori', $profil->kategori) == 'Sambutan' ? 'selected' : '' }}>Sambutan</option>
                <option value="tentang kami" {{ old('kategori', $profil->kategori) == 'tentang kami' ? 'selected' : '' }}>Tentang Kami</option>
                <option value="sejarah" {{ old('kategori', $profil->kategori) == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                <option value="Visi" {{ old('kategori', $profil->kategori) == 'Visi' ? 'selected' : '' }}>Visi</option>
                <option value="Misi" {{ old('kategori', $profil->kategori) == 'Misi' ? 'selected' : '' }}>Misi</option>
                <option value="Lainnya" {{ old('kategori', $profil->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('kategori')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- Input Isi --}}
        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">
                Isi
            </label>
            <x-quill-editor
                editor-id="myPostEditor" {{-- ID Div Editor --}}
                toolbar-id="myPostToolbar" {{-- ID Toolbar --}}
                content-input-id="hiddenPostContent" {{-- ID Hidden Input (PENTING!) --}}
                content="{!! $profil->isi ?? '' !!}" {{-- Konten lama (jika ada) --}} />

            {{-- 2. HIDDEN INPUT (Harus berada di dalam form dan ID-nya harus sesuai dengan content-input-id di atas) --}}
            <input type="hidden" name="isi" id="hiddenPostContent">
            <!--<input id="content" type="hidden" name="isi" value="{{ old('isi', $profil->isi) }}">
            <trix-editor input="content"></trix-editor> -->

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