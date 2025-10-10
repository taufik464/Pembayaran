@extends('layouts.admin')
@section('title', 'Edit Prestasi')
@section('content')
<x-page-header
    title="Edit Prestasi"
    :breadcrumb="[
       
        ['url' => route('achive.index'), 'label' => 'Prestasi'],
        ['url' => '#', 'label' => 'Edit'],
    ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <form action="{{ route('achive.update', $achive->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2" value="{{ old('judul', $achive->judul) }}">
        </div>

        <div>
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2">{{ old('deskripsi', $achive->deskripsi) }}</textarea>
        </div>

        <div>
            <label>Tingkat</label>
            <input type="text" name="tingkat" class="w-full border rounded p-2" value="{{ old('tingkat', $achive->tingkat) }}">
        </div>

        <div>
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="w-full border rounded p-2" value="{{ old('tanggal', $achive->tanggal) }}">
        </div>


        <div>
            <label>Jenis</label>
            <select name="jenis" class="w-full border rounded p-2">
                <option value="sekolah" {{ $achive->jenis == 'sekolah' ? 'selected' : '' }}>Sekolah</option>
                <option value="siswa" {{ $achive->jenis == 'siswa' ? 'selected' : '' }}>Siswa</option>
            </select>
        </div>

        <div>
            <label>Gambar</label>
            @if($achive->gambar)
                <img src="{{ asset('storage/'.$achive->gambar) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="gambar" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('achive.index') }}" class="bg-red-400 text-white px-4 py-2 rounded ml-2 inline-block">Batal</a>
    </form>
</section>
@endsection
