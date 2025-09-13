@extends('layouts.admin')
@section('title', 'Edit SAPRAS')
@section('content')
<x-page-header
    title="Edit SAPRAS"
    :breadcrumb="[
            ['url' => '/dashboard', 'label' => 'Dashboard'],
            ['url' => '/admin/sapras', 'label' => 'SAPRAS'],
        ]" />

<section class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.sapras.update', $sapras->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-medium">Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2" required value="{{ old('judul', $sapras->judul ?? '') }}">
            @error('judul')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium">Gambar</label>
            <input type="file" name="gambar" class="w-full border rounded p-2">
            @if($sapras->gambar)
            <div class="mt-3">
                <p class="text-sm text-gray-600">Gambar saat ini:</p>
                <img src="{{ asset('storage/'.$sapras->gambar) }}"
                    alt="Preview"
                    class="h-32 rounded-lg mt-2 border border-gray-200 shadow-sm">
            </div>
            @endif
            @error('gambar')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex space-x-3">
            <button type="submit"
                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                Simpan
            </button>
            <a href="{{ route('admin.sapras') }}"
                class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">
                Batal
            </a>
        </div>
    </form>
</section>
@endsection
