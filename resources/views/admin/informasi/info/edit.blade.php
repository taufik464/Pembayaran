@extends('layouts.admin')
@section('title', 'Informasi Sekolah')

@php
$title = "Manajemen Informasi Sekolah";
$breadcrumb = [
['url' => '/admin/informasi', 'label' => 'Informasi Sekolah'],
['url' => '', 'label' => 'Edit Informasi Sekolah'],
];
@endphp
@section('content')

<section class="bg-white mt-6 p-6 rounded-lg shadow">
    <form action="{{ route('admin.informasi.update', $informasi->id ?? '') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Input Judul --}}
        <div class="mb-4">
            <label for="judul" class="block font-medium">
                Judul
            </label>
            <input type="text" name="judul" id="judul"
                value="{{ old('judul', $informasi->title ?? '') }}"
                class="w-full border rounded p-2">
            @error('judul')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Select Kategori --}}
        <div class="mb-4">
            <label for="kategori-_id" class="block font-medium">
                Kategori
            </label>
            <select id="kategori_id" name="kategori_id" required
                class=" w-full border rounded p-2">
                <option value="" disabled>Pilih Kategori</option>

                @foreach($kategori as $kat)
                <option value="{{ $kat->id }}" {{ (old('kategori_id', $informasi->category_id ?? '') == $kat->id) ? 'selected' : '' }}>{{ $kat->name }}</option>
                @endforeach
            </select>
            @error('kategori_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- Input Isi --}}
        <div class=" mb-4">
            <label for="konten" class="block font-medium">
                Isi
            </label>
            <x-quill-editor
                editorId="myPostEditor" {{-- ID Div Editor --}}
                toolbarId="myPostToolbar" {{-- ID Toolbar --}}
                contentInputId="hiddenPostContent" {{-- ID Hidden Input (PENTING!) --}}
                content="{!! $informasi->content ?? '' !!}" {{-- Konten lama (jika ada) --}} />

            {{-- 2. HIDDEN INPUT (Harus berada di dalam form dan ID-nya harus sesuai dengan content-input-id di atas) --}}
            <input type="hidden" name="konten" id="hiddenPostContent">


            @error('konten')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Upload Gambar --}}
        <div class="mb-4">
            <x-image-uploader
                name="images"
                label="Upload Gambar Informasi"
                :existing="$existingImages" />
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.informasi') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</section>

@endsection