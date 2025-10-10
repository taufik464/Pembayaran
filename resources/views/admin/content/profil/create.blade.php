@extends('layouts.admin')
@section('title', 'Tambah Profil Sekolah')

@section('content')
<x-page-header
    title="Tambah Profil Sekolah"
    :breadcrumb="[
       
        ['url' => route('profil.index'), 'label' => 'Profil Sekolah'],
        ['url' => '#', 'label' => 'Tambah Data'],
    ]" />

<section class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2" required>
            @error('judul')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Kategori</label>
            <select name="kategori" class="w-full border rounded p-2" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Sambutan">Sambutan</option>
                <option value="tentang kami">Tentang Kami</option>
                <option value="sejarah">Sejarah</option>
                <option value="Visi">Visi</option>
                <option value="Misi">Misi</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            @error('kategori')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium">Isi</label>
            <input id="content" type="hidden" name="isi">
            <trix-editor input="content"></trix-editor> @error('isi')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Gambar</label>
            <input type="file" name="image" class="w-full border rounded p-2">
            @error('image')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-3">
            <button type="submit"
                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                Simpan
            </button>
            <a href="{{ route('profil.index') }}"
                class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">
                Batal
            </a>
        </div>
    </form>
</section>
@endsection