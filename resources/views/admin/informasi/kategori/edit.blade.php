@extends('layouts.admin')
@section('title', 'Kategori Informasi')
@section('content')
<x-page-header
    title="Edit Kategori Informasi"
    :breadcrumb="[
            ['url' => '/admin/kategori', 'label' => 'Kategori Informasi'],
            ['url' => '', 'label' => 'Tambah Kategori Informasi'],
        ]" />
<section class=" relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-5">
    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class=" max-w-lg mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
            <input type="text" id="name" name="name" required value="{{ old('judul', $kategori->name ?? '') }}""
                class=" w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan nama kategori">
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">Simpan</button>
        </div>
    </form>
</section>