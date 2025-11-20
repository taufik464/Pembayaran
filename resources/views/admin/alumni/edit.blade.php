@extends('layouts.admin')
@section('title', 'Data Alumni')
@php
$title = "Manajemen Data Alumni";
$breadcrumb = [
['url' => '/admin/alumni', 'label' => 'Data Alumni'],
['url' => '', 'label' => 'Edit Data Alumni'],
];
@endphp

@section('content')
<section class=" bg-white mt-6 p-6 rounded-lg shadow">
    <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data"
        class="">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Alumni:</label>
            <input type="text" id="nama" name="nama" required
                class="w-full px-3 py-2 border @error('nama') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan nama alumni"
                value="{{ old('nama', $alumni->nama) }}">
            @error('nama')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tahun_lulus" class="block text
.gray-700 font-bold mb-2">Tahun Lulus:</label>
            <input type="number" id="tahun_lulus" name="tahun_lulus" required min="1900" max="{{ date('Y') }}"
                class="w-full px-3 py-2 border @error('tahun_lulus') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan tahun lulus"
                value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}">
            @error('tahun_lulus')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="kuliah" class="block text-gray-700 font-bold mb-2">Perguruan Tinggi:</label>
            <input type="text" id="kuliah" name="kuliah"
                class="w-full px-3 py-2 border @error('kuliah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan nama perguruan tinggi"
                value="{{ old('kuliah', $alumni->kuliah) }}">
            @error('kuliah')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tempat_kuliah" class="block text-gray-700 font-bold mb-2">Tempat Kuliah:</label>
            <input type="text" id="tempat_kuliah" name="tempat_kuliah"
                class="w-full px-3 py-2 border @error('tempat_kuliah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan tempat kuliah"
                value="{{ old('tempat_kuliah', $alumni->tempat_kuliah) }}">
            @error('tempat_kuliah')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="pekerjaan" class="block text-gray-700 font-bold mb-2">Pekerjaan:</label>
            <input type="text" id="pekerjaan" name="pekerjaan"
                class="w-full px-3 py-2 border @error('pekerjaan') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan pekerjaan"
                value="{{ old('pekerjaan', $alumni->pekerjaan) }}">
            @error('pekerjaan')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tempat_kerja" class="block text-gray-700 font-bold mb-2">Tempat Kerja:</label>
            <input type="text" id="tempat_kerja" name="tempat_kerja"
                class="w-full px-3 py-2 border @error('tempat_kerja') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan tempat kerja"
                value="{{ old('tempat_kerja', $alumni->tempat_kerja) }}">
            @error('tempat_kerja')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="pesan" class="block text-gray-700 font-bold mb-2">Pesan:</label>
            <textarea id="pesan" name="pesan"
                class="w-full px-3 py-2 border @error('pesan') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan pesan">{{ old('pesan', $alumni->pesan) }}</textarea>
            @error('pesan')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="foto" class="block text-gray-700 font-bold mb-2">Foto Alumni:</label>
            <input type="file" id="foto" name="foto"
                class="w-full px-3 py-2 border @error('foto') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @if ($alumni->foto)
            <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Foto Alumni" class="mt-2 w-32 h-32 object-cover rounded">
            @endif
            @error('foto')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan
                Perubahan</button>
        </div>
    </form> 
</section>
@endsection