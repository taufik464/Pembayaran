@extends('layouts.admin')
@section('title', 'KONTAK')
@php
$title = 'Manajemen Kontak';
$breadcrumb = [

['label' => 'KONTAK', 'url' => route('admin.kontak')],
];
@endphp
@section('content')

<section class="bg-white mt-6 p-5 rounded-lg shadow">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.kontak.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
            Tambah Kontak
        </a>
    </div>

    @if($kontaks->isEmpty())
    <div class="text-center text-gray-500 py-10">
        Tidak ada data kontak.
    </div>
    @else
    <div class="space-y-4">
        @foreach($kontaks as $item)
        <x-kontak-card
            image="{{ $item->image ? asset('storage/'.$item->image) : asset('images/default-kontak.jpg') }}"
            nama="{{ $item->nama }}"
            link="{{ $item->link }}"
            nomor="{{ $item->nomor }}"
            editUrl="{{ route('admin.kontak.edit', $item->id) }}"
            hapusUrl="{{ route('admin.kontak.destroy', $item->id) }}" />
        @endforeach
    </div>
    @endif
</section>
@endsection