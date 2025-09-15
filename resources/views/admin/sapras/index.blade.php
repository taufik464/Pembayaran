@extends('layouts.admin')
@section('title', 'SAPRAS')
@section('content')
<x-page-header
    title="Manajemen SAPRAS"
    :breadcrumb="[
            ['url' => '/dashboard', 'label' => 'Dashboard'],
            ['url' => '/admin/sapras', 'label' => 'SAPRAS'],
        ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.sapras.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Data
        </a>
    </div>
    @if($sapras->isEmpty())
    <div class="text-center text-gray-500 py-10">
        Tidak ada data SAPRAS.
    </div>
    @else
    @foreach($sapras as $item)
    <x-sapras-card
        image="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default-sapras.jpg') }}"
        judul="{{ $item->judul }}"
        editUrl="{{ route('admin.sapras.edit', $item->id) }}"
        hapusUrl="{{ route('admin.sapras.destroy', $item->id) }}" />
    @endforeach
    @endif
</section>
@endsection
