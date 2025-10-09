@extends('layouts.admin')
@section('title', 'Edit Prestasi')
@section('content')
<x-page-header
    title="Edit Prestasi"
    :breadcrumb="[
        ['url' => '/dashboard', 'label' => 'Dashboard'],
        ['url' => route('achive.index'), 'label' => 'Prestasi'],
        ['url' => '#', 'label' => 'Edit'],
    ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <form action="{{ route('achive.update', $achive->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div>
            <label class="block font-semibold mb-1">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="judul" class="w-full border rounded p-2" value="{{ old('judul', $achive->judul) }}" required>
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block font-semibold mb-1">Deskripsi <span class="text-red-500">*</span></label>
            <textarea name="deskripsi" class="w-full border rounded p-2" required>{{ old('deskripsi', $achive->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tingkat --}}
        <div>
            <label class="block font-semibold mb-1">Tingkat <span class="text-red-500">*</span></label>
            <input type="text" name="tingkat" class="w-full border rounded p-2" value="{{ old('tingkat', $achive->tingkat) }}" required>
            @error('tingkat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div>
            <label class="block font-semibold mb-1">Tanggal <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal" class="w-full border rounded p-2" value="{{ old('tanggal', $achive->tanggal) }}" required>
            @error('tanggal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Jenis --}}
        <div>
            <label class="block font-semibold mb-1">Jenis <span class="text-red-500">*</span></label>
            <select name="jenis" class="w-full border rounded p-2" required>
                <option value="sekolah" {{ old('jenis', $achive->jenis) == 'sekolah' ? 'selected' : '' }}>Sekolah</option>
                <option value="siswa" {{ old('jenis', $achive->jenis) == 'siswa' ? 'selected' : '' }}>Siswa</option>
            </select>
            @error('jenis')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gambar --}}
        <div>
            <label class="block font-semibold mb-1">Gambar (Opsional)</label>
            @if($achive->gambar)
                <img src="{{ asset('storage/'.$achive->gambar) }}" width="100" class="mb-2 rounded">
            @endif
            <input type="file" name="gambar" class="w-full border rounded p-2" accept=".jpg,.jpeg,.png">
            @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Update --}}
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('achive.index') }}" class="bg-red-400 text-white px-4 py-2 rounded ml-2 inline-block">Batal</a>
    </form>
</section>
@endsection
