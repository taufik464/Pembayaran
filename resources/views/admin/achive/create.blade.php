@extends('layouts.admin')
@section('title', 'Tambah Prestasi')

@section('content')
<x-page-header
    title="Tambah Prestasi"
    :breadcrumb="[
      
        ['url' => route('achive.index'), 'label' => 'Prestasi'],
        ['url' => '#', 'label' => 'Tambah'],
    ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <form action="{{ route('achive.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Judul --}}
        <div>
            <label class="block font-semibold mb-1">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="judul" class="w-full border rounded p-2" value="{{ old('judul') }}" required>
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block font-semibold mb-1">Deskripsi <span class="text-red-500">*</span></label>
            <textarea name="deskripsi" class="w-full border rounded p-2" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tingkat --}}
        <div>
            <label class="block font-semibold mb-1">Tingkat <span class="text-red-500">*</span></label>
            <input type="text" name="tingkat" class="w-full border rounded p-2" value="{{ old('tingkat') }}" required>
            @error('tingkat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-4">
            <label class="block font-medium">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border rounded p-2" value="{{ old('tanggal') }}">
            @error('tanggal')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        

        {{-- Jenis --}}
        <div>
            <label class="block font-semibold mb-1">Jenis <span class="text-red-500">*</span></label>
            <select name="jenis" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="sekolah" {{ old('jenis') == 'sekolah' ? 'selected' : '' }}>Sekolah</option>
                <option value="siswa" {{ old('jenis') == 'siswa' ? 'selected' : '' }}>Siswa</option>
            </select>
            @error('jenis')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gambar --}}
        <div>
            <label class="block font-semibold mb-1">Gambar (Opsional)</label>
            <input type="file" name="gambar" class="w-full border rounded p-2" accept=".jpg,.jpeg,.png">
            @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Simpan --}}
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('achive.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded ml-2 inline-block">Batal</a>
    </form>
</section>
@endsection
