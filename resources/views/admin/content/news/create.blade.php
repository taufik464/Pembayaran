@extends('layouts.admin')
@section('title', 'Tambah Berita')

@section('content')
<x-page-header
    title="Tambah Berita"
    :breadcrumb="[
      
        ['url' => route('admin.news'), 'label' => 'Berita'],
        ['url' => '#', 'label' => 'Tambah Data'],
    ]" />

<section class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Judul Berita</label>
            <input type="text" name="judul" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Isi Berita</label>
            <textarea name="isi" rows="6" class="w-full border rounded p-2" required></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-medium">Penulis</label>
                <input type="text" name="penulis" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Gambar Berita</label>
            <input type="file" name="gambar" class="w-full border rounded p-2">
            <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, JPEG. Maksimal 2MB.</p>
        </div>

        <div class="flex space-x-3">
            <button type="submit"
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                Simpan
            </button>
            <a href="{{ route('admin.news') }}"
               class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">
                Batal
            </a>
        </div>
    </form>
</section>
@endsection
