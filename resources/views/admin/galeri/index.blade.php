@php
    use Carbon\Carbon;
@endphp
@extends('layouts.admin')
@section('title', 'Galeri')
@section('content')
<x-page-header
    title="Manajemen Galeri"
    :breadcrumb="[
            ['url' => '/dashboard', 'label' => 'Dashboard'],
            ['url' => '/admin/galeri', 'label' => 'Galeri'],
        ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.galeri.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Data
        </a>
    </div>
    @if($galeri->isEmpty())
    <div class="text-center text-gray-500 py-10">
        Tidak ada data galeri.
    </div>
    @else
    @foreach($galeri as $item)
    <x-galeri-card
        image="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default-galeri.jpg') }}"
        judul="{{ $item->judul }}"
        isi="{{ $item->deskripsi }}"
        tanggal="{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '' }}"
        editUrl="{{ route('admin.galeri.edit', $item->id) }}"
        hapusUrl="{{ route('admin.galeri.destroy', $item->id) }}" />
    @endforeach
    @endif
</section>
@endsection
