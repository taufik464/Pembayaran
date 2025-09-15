@extends('layouts.landing')
@section('title', 'Sarana & Prasarana')
@section('content')
<x-page-header
    title="Sarana & Prasarana Sekolah"
    :breadcrumb="[
            ['url' => '/', 'label' => 'Beranda'],
            ['url' => route('sarpras'), 'label' => 'Sarana & Prasarana'],
        ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Daftar Sarana & Prasarana</h2>
    @if($sapras->isEmpty())
    <div class="text-center text-gray-500 py-10">
        Tidak ada data sarana & prasarana.
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($sapras as $item)
        <x-sapras-card
            image="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default-sapras.jpg') }}"
            judul="{{ $item->judul }}"
        />
        @endforeach
    </div>
    @endif
</section>
@endsection
