@extends('layouts.admin')
@section('title', 'Informasi Sekolah')
@php
$title = "Manajemen Informasi Sekolah";
$breadcrumb = [
['url' => '/admin/informasi', 'label' => 'Informasi Sekolah'],
['url' => '', 'label' => 'Tambah Informasi Sekolah'],
];
@endphp
@section('content')

<section class=" bg-white mt-6 p-6 rounded-lg shadow">
    <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data"
        class="">
        @csrf
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-bold mb-2">Judul Informasi:</label>
            <input type="text" id="judul" name="judul" required
                class="w-full px-3 py-2 border @error('judul') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan judul informasi"
                value="{{ old('judul') }}">
            @error('judul')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="kategori_id" class="block text-gray-700 font-bold mb-2">Kategori Informasi:</label>
            <select id="kategori_id" name="kategori_id" required
                class="w-full px-3 py-2 border @error('kategori_id') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach($kategori as $kat)
                <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>{{ $kat->name }}</option>
                @endforeach
            </select>
            @error('kategori_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">


            <!-- Komponen Quill -->
            <x-quill-editor
                editorId="myPostEditor" {{-- ID Div Editor --}}
                toolbarId="myPostToolbar"
                contentInputId="hiddenContent"
                :content="old('konten')" />
            <input type="hidden" name="konten" id="hiddenContent">
            @error('konten')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <x-image-uploader name="images" label="Upload Gambar Informasi" />
        </div>




        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">Simpan</button>
        </div>
    </form>
</section>
@endsection