@extends('layouts.admin')
@php
$title = 'Manajemen PPDB';
$breadcrumb = [
['label' => 'Manajemen PPDB', 'url' => route('admin.ppdb.dashboard')],
];

@endphp

@section('content')
<div class="min-h-screen p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Panel Dashboard PPDB</h1>

    <div class="mb-10">
        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500 flex items-center justify-between">

            <!-- Kiri: Statistik -->
            <div>
                <p class="text-sm text-gray-500 font-semibold uppercase">Total Pendaftar</p>
                <p class="text-3xl font-bold">{{ $stats['total_pendaftar'] }}</p>
            </div>

            <!-- Kanan: Tombol -->
            <a href="{{ route('admin.ppdb.list') }}"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                Lihat Data Pendaftar
            </a>

        </div>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-xl font-bold mb-6 text-gray-700 border-b pb-2">Pengaturan PPDB</h2>

            @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('admin.control.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul PPDB</label>
                    <input type="text" name="title" value="{{ $control->title }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                    <textarea name="description" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border p-2">{{ $control->description }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                        <input type="datetime-local" name="start_date" value="{{ $control->start_date ? date('Y-m-d\TH:i', strtotime($control->start_date)) : '' }}" class="w-full border-gray-300 rounded-lg shadow-sm border p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                        <input type="datetime-local" name="end_date" value="{{ $control->end_date ? date('Y-m-d\TH:i', strtotime($control->end_date)) : '' }}" class="w-full border-gray-300 rounded-lg shadow-sm border p-2">
                    </div>
                </div>

                <div class="flex items-center mb-6">
                    <input id="is_active" name="is_active" type="checkbox" {{ $control->is_active ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900 font-semibold uppercase">
                        Aktifkan Sistem Pendaftaran Online
                    </label>
                </div>

                <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600 transition duration-200">
                    Simpan Perubahan
                </button>
            </form>
        </div>

        <div class="bg-blue-50 p-8 rounded-xl border border-blue-100">
            <h2 class="text-xl font-bold mb-4 text-blue-800 text-center">Status Sistem Saat Ini</h2>
            <div class="flex flex-col items-center justify-center space-y-4 py-6">
                @if($status)
                <div class="h-16 w-16 bg-green-500 rounded-full animate-pulse border-4 border-white shadow-lg"></div>
                <span class="text-2xl font-black text-green-600">ONLINE</span>
                <p class="text-gray-600 text-center">Siswa dapat melakukan pengisian form pendaftaran saat ini.</p>
                @else
                <div class="h-16 w-16 bg-red-500 rounded-full border-4 border-white shadow-lg"></div>
                <span class="text-2xl font-black text-red-600">OFFLINE</span>
                <p class="text-gray-600 text-center">Sistem pendaftaran ditutup secara manual oleh admin.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection