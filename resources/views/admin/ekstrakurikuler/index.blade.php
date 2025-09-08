@extends('layouts.admin')
@section('title', 'Ekstrakurikuler')
@section('content')
<x-page-header
    title="Manajemen Ekstrakurikuler"
    :breadcrumb="[
            ['url' => '/dashboard', 'label' => 'Dashboard'],
            ['url' => '/admin/ekstrakurikuler', 'label' => 'Ekstrakurikuler'],
        ]" />

<section class=" bg-white p-5 rounded-lg shadow">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.ekstrakurikuler.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Data
        </a>
    </div>
    @if($ekskul->isEmpty())
    <div class="text-center text-gray-500 py-10">
        Tidak ada data ekstrakurikuler.
    </div>
    @else
    @foreach($ekskul as $item)
    <x-ekstra-card
        image="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default-ekstra.jpg') }}"
        judul="{{ $item->nama }}"
        isi="{{ $item->deskripsi }}"
        editUrl="{{ route('admin.ekstrakurikuler.edit', $item->id) }}"
        hapusUrl="{{ route('admin.ekstrakurikuler.destroy', $item->id) }}" />
    @endforeach
    @endif
</section>

@endsection