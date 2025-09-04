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
    @php
        $ekstrakurikuler = [
            [
                'image' => asset('images/siswa1.jpg'),
                'judul' => 'Data Siswa',
                'isi' => 'Berisi informasi lengkap mengenai siswa yang terdaftar',
            ],
            [
                'image' => asset('images/osis.jpg'),
                'judul' => 'Data OSIS',
                'isi' => 'Informasi tentang kegiatan OSIS dan anggotanya',
            ],
            [
                'image' => asset('images/pramuka.jpg'),
                'judul' => 'Data Pramuka',
                'isi' => 'Kegiatan dan anggota ekstrakurikuler Pramuka',
            ],
        ];
    @endphp

    @foreach($ekstrakurikuler as $item)
        <x-ekstra-card
            image="{{ $item['image'] }}"
            judul="{{ $item['judul'] }}"
            isi="{{ $item['isi'] }}" />
    @endforeach
</section>

@endsection