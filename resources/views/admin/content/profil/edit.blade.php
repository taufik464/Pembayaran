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


<section class="bg-white mt-6 p-6 rounded-lg shadow">
    <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Input Judul --}}
        <div class="mb-4">
            <label class="block font-medium">Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2" required value="{{ old('judul', $profil->judul) }}">
            @error('judul')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Kategori</label>
            <select name="kategori" class="w-full border rounded p-2" required>
                <option value="" disabled {{ old('kategori', $profil->kategori) ? '' : 'selected' }}>Pilih Kategori</option>
                <option value="Sambutan" {{ old('kategori', $profil->kategori) == 'Sambutan' ? 'selected' : '' }}>Sambutan</option>
                <option value="tentang kami" {{ old('kategori', $profil->kategori) == 'tentang kami' ? 'selected' : '' }}>Tentang Kami</option>
                <option value="sejarah" {{ old('kategori', $profil->kategori) == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                <option value="Visi" {{ old('kategori', $profil->kategori) == 'Visi' ? 'selected' : '' }}>Visi</option>
                <option value="Misi" {{ old('kategori', $profil->kategori) == 'Misi' ? 'selected' : '' }}>Misi</option>
                <option value="Lainnya" {{ old('kategori', $profil->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>

            </select>
            @error('kategori')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <x-quill-editor
                editorId="myPostEditor" {{-- ID Div Editor --}}
                toolbarId="myPostToolbar" {{-- ID Toolbar --}}
                contentInputId="hiddenPostContent" {{-- ID Hidden Input (PENTING!) --}}
                content="{!! $profil->isi ?? '' !!}" {{-- Konten lama (jika ada) --}} />
            <input type="hidden" name="isi" id="hiddenPostContent">
        </div>


        <div class="mb-4">
            <label class="block font-medium">Gambar</label>
            <input type="file" name="image" class="w-full border rounded p-2">
            @if($profil->image)
            <div class="mt-3">
                <p class="text-sm text-gray-600">Gambar saat ini:</p>
                <img src="{{ asset('storage/'.$profil->image) }}"
                    alt="Preview"
                    class="h-32 rounded-lg mt-2 border border-gray-200 shadow-sm">
            </div>
            @endif
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
