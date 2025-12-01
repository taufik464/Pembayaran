@extends('layouts.admin')
@section('title', 'Profil Saya')
@section('content')

@php
// Definisikan Judul dan Breadcrumb
$title = 'Profil Saya';
$breadcrumb = [
['label' => 'Profil Saya', 'url' => '/admin/profile'],
];


// Inisialisasi default
$initials = 'U';
$bgColorClass = 'bg-gray-600';

// Pastikan $user ada dan memiliki nama sebelum memproses
if ($user && !empty($user->name)) {
$fullName = $user->name;
$nameParts = explode(' ', trim($fullName));

// --- 1. Logika Inisial DUA HURUF ---
if (count($nameParts) >= 2) {
// Ambil inisial dari kata pertama dan kedua (misal: Ilfan Taufiqur -> IT)
$initials = strtoupper(substr($nameParts[0], 0, 1) . substr($nameParts[1], 0, 1));
} else {
// Jika hanya satu kata: ambil dua huruf awal
$initials = strtoupper(substr($nameParts[0], 0, 2));
}

// --- 2. Logika Warna Dinamis ---
$colors = [
'bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-indigo-500',
'bg-purple-500', 'bg-pink-500', 'bg-teal-500', 'bg-yellow-500'
];

$colorIndex = strlen($fullName) % count($colors);
$bgColorClass = $colors[$colorIndex];
}
@endphp


<div class="w-full mt-6">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        {{-- Header dan Tanggal --}}
        <header class="flex justify-between items-center border-b p-4"> {{-- Padding disamakan --}}
            <div></div>
            <p class="text-sm text-gray-600">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </p>
        </header>

        <div class="p-6 text-gray-900 dark:text-gray-100">

            {{-- CONTAINER FOTO + INFORMASI (Menggunakan flex items-start dan gap-6) --}}
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">

                {{-- KIRI: FOTO/INISIAL PROFIL (Fixed Width) --}}
                <div class="flex-shrink-0">
                    @if ($user->foto ?? null)
                    {{-- KONDISI 1: FOTO ADA --}}
                    <img
                        class="w-32 h-32 lg:w-48 lg:h-48 rounded-full object-cover shadow-md"
                        src="{{ asset('storage/' . $user->foto) }}"
                        alt="Foto Profil {{ $user->name }}">
                    @else
                    {{-- KONDISI 2: FOTO TIDAK ADA, TAMPILKAN DUA INISIAL TEKS DENGAN WARNA DINAMIS --}}
                    <span
                        class="flex items-center justify-center 
                   w-32 h-32 lg:w-48 lg:h-48 
                   rounded-full {{ $bgColorClass }} text-white 
                   font-bold text-4xl lg:text-6xl leading-none shadow-md 
                   transform translate-y-px"> {{-- <-- TAMBAHKAN KELAS INI --}}
                        {{ $initials }}
                    </span>
                    @endif
                </div>

                {{-- KANAN: KARTU INFORMASI (Mengambil Sisa Lebar: flex-grow) --}}
                {{-- CATATAN: Div ini harus berada di dalam container flex utama --}}
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg shadow p-6 w-full md:flex-grow">

                    <h3 class="text-lg font-bold mb-4 border-b pb-2">Detail Akun</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Nama --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nama</label>
                            <p class="text-gray-900 dark:text-gray-100 font-semibold">{{ $user->name }}</p>
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email</label>
                            <p class="text-gray-900 dark:text-gray-100 font-semibold">{{ $user->email }}</p>
                        </div>

                        {{-- Jabatan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Jabatan</label>
                            <p class="text-gray-900 dark:text-gray-100 font-semibold">{{ $user->role }}</p>
                        </div>

                        {{-- Bergabung Sejak --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Bergabung Sejak</label>
                            <p class="text-gray-900 dark:text-gray-100 font-semibold">{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div> {{-- Penutup CONTAINER FOTO + INFORMASI --}}

        </div>
    </div>
</div>
@endsection