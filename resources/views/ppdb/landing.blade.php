@extends('layouts.web')
@php
$title = 'PPDB Online 2025 - Penerimaan Peserta Didik Baru';
$breadcrumb = [
['label' => 'PPDB Online', 'url' => route('ppdb')],
];
@endphp
@section('content')

<div class="bg-gray-50 font-sans">
    <header class="bg-white py-12 border-b">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4">Penerimaan Peserta Didik Baru</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Selamat datang di portal pendaftaran resmi. Silakan baca panduan di bawah ini sebelum melanjutkan ke formulir pendaftaran.
            </p>
        </div>
    </header>

    <main class="container mx-auto px-6 py-10">
        <div class="grid md:grid-cols-2 gap-8">

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fas fa-file-medical-alt mr-2"></i> Persiapan Dokumen
                </h3>
                <p class="text-sm text-gray-500 mb-4">Pastikan dokumen berikut sudah di-scan (format JPG/PDF, maks 2MB):</p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i> Akta Kelahiran Asli
                    </li>
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i> Kartu Keluarga (KK)
                    </li>
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i> Ijazah atau Surat Keterangan Lulus
                    </li>
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i> Pas Foto 3x4 (Background Merah)
                    </li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-blue-700 mb-4 flex items-center">
                    <i class="fas fa-project-diagram mr-2"></i> Alur Pendaftaran
                </h3>
                <div class="relative">
                    <div class="border-l-2 border-blue-100 ml-3 space-y-6">
                        <div class="relative ml-6">
                            <span class="absolute -left-10 bg-blue-500 text-white w-7 h-7 rounded-full text-xs flex items-center justify-center font-bold">1</span>
                            <h4 class="font-semibold">Isi Formulir</h4>
                            <p class="text-sm text-gray-600">Lengkapi data diri dan unggah dokumen pendukung.</p>
                            <p class="text-sm text-gray-600">{{ $konten->start_date }} - {{ $konten->end_date }}</p>

                        </div>
                        <div class="relative ml-6">
                            <span class="absolute -left-10 bg-blue-500 text-white w-7 h-7 rounded-full text-xs flex items-center justify-center font-bold">2</span>
                            <h4 class="font-semibold">Verifikasi</h4>
                            <p class="text-sm text-gray-600">Panitia akan memeriksa keaslian data Anda.</p>
                        </div>
                        <div class="relative ml-6">
                            <span class="absolute -left-10 bg-blue-500 text-white w-7 h-7 rounded-full text-xs flex items-center justify-center font-bold">3</span>
                            <h4 class="font-semibold">Pengumuman</h4>
                            <p class="text-sm text-gray-600">Hasil seleksi akan diumumkan melalui dashboard ini.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">


            <a href="{{ route('ppdb.form') }}" class="bg-green-500  text-white px-10 py-4 rounded-full font-bold text-lg shadow-lg ">
                MULAI PENDAFTARAN SEKARANG
            </a>
            <p class="text-xs text-gray-400 mt-4">Pendaftaran dibuka hingga {{ $konten->end_date }}</p>
        </div>
    </main>

    
</div>
@endsection