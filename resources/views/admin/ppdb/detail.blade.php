@extends('layouts.admin')

@php
$title = "Detail Pendaftar PPDB";
$breadcrumb = [
['label' => 'Manajemen PPDB', 'url' => route('admin.ppdb.dashboard')],
['label' => 'Detail Pendaftar', 'url' => ''],
];
@endphp

@section('content')
<div class="p-6 lg:p-8 bg-gray-50 min-h-screen">
    {{-- Header & Aksi --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800">Detail Pendaftar</h1>
            <p class="text-gray-500 text-sm">ID Pendaftaran: #{{ $applicant->id }} | Terdaftar pada: {{ $applicant->created_at->format('d M Y H:i') }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.ppdb.dashboard') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition shadow-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
           
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        {{-- KOLOM KIRI: Data Pribadi & Minat --}}
        <div class="xl:col-span-2 space-y-8">

            {{-- Card 1: Data Pribadi --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center">
                    <i class="fas fa-user-circle text-emerald-600 mr-3 text-xl"></i>
                    <h2 class="text-lg font-bold text-gray-700">Informasi Pribadi</h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Nama Lengkap</label>
                        <p class="text-gray-800 font-semibold">{{ $applicant->nama }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">NIK</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->nik }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">NISN</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->nisn }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Jenis Kelamin</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->jk }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Tempat, Tanggal Lahir</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->tgl_lahir }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Agama</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->agama }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Asal Sekolah</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->asal_sekolah }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Nomor HP/WA</label>
                        <a href="https://wa.me/{{ $applicant->no_hp }}" target="_blank" class="text-emerald-600 font-bold hover:underline">
                            {{ $applicant->no_hp }} <i class="fab fa-whatsapp ml-1"></i>
                        </a>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Alamat</label>
                        <p class="text-gray-800 leading-relaxed">{{ $applicant->alamat }}</p>
                    </div>
                </div>
            </div>

            {{-- Card 2: Bakat & Minat --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center">
                    <i class="fas fa-star text-amber-500 mr-3 text-xl"></i>
                    <h2 class="text-lg font-bold text-gray-700">Bakat & Minat</h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-amber-50/50 p-4 rounded-xl border border-amber-100">
                        <label class="block text-[10px] font-bold text-amber-600 uppercase mb-1">Hobi</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->hobi }}</p>
                    </div>
                    <div class="bg-amber-50/50 p-4 rounded-xl border border-amber-100">
                        <label class="block text-[10px] font-bold text-amber-600 uppercase mb-1">Olahraga</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->olahraga }}</p>
                    </div>
                    <div class="md:col-span-2 bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                        <label class="block text-[10px] font-bold text-blue-600 uppercase mb-1">Bidang Studi yang Disukai / Cita-cita</label>
                        <p class="text-gray-800 font-medium">{{ $applicant->bidang_studi }} — <span class="italic text-blue-700">{{ $applicant->cita_cita }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: Orang Tua & Berkas --}}
        <div class="space-y-8">

            {{-- Card 3: Data Orang Tua --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center">
                    <i class="fas fa-users text-blue-600 mr-3 text-xl"></i>
                    <h2 class="text-lg font-bold text-gray-700">Orang Tua / Wali</h2>
                </div>
                <div class="p-6 space-y-6">
                    {{-- Ayah --}}
                    <div>
                        <div class="flex items-center mb-2">
                            <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                            <h4 class="text-xs font-bold text-gray-400 uppercase">Ayah</h4>
                        </div>
                        <p class="text-gray-800 font-bold">{{ $applicant->nama_ayah }}</p>
                        <p class="text-sm text-gray-500">{{ $applicant->pekerjaan_ayah }} ({{ $applicant->penghasilan_ayah }})</p>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-gray-100 text-gray-600">{{ $applicant->keterangan_ayah }}</span>
                    </div>
                    <hr class="border-gray-50">
                    {{-- Ibu --}}
                    <div>
                        <div class="flex items-center mb-2">
                            <span class="w-2 h-2 bg-pink-400 rounded-full mr-2"></span>
                            <h4 class="text-xs font-bold text-gray-400 uppercase">Ibu</h4>
                        </div>
                        <p class="text-gray-800 font-bold">{{ $applicant->nama_ibu }}</p>
                        <p class="text-sm text-gray-500">{{ $applicant->pekerjaan_ibu }} ({{ $applicant->penghasilan_ibu }})</p>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-gray-100 text-gray-600">{{ $applicant->keterangan_ibu }}</span>
                    </div>
                    @if($applicant->nama_wali)
                    <hr class="border-gray-50">
                    {{-- Wali --}}
                    <div>
                        <div class="flex items-center mb-2">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full mr-2"></span>
                            <h4 class="text-xs font-bold text-gray-400 uppercase">Wali</h4>
                        </div>
                        <p class="text-gray-800 font-bold">{{ $applicant->nama_wali }}</p>
                        <p class="text-sm text-gray-500">{{ $applicant->pekerjaan_wali }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Card 4: Berkas --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center">
                    <i class="fas fa-file-invoice text-red-500 mr-3 text-xl"></i>
                    <h2 class="text-lg font-bold text-gray-700">Lampiran Berkas</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="flex items-center">
                            <i class="fas fa-file-pdf text-red-500 mr-3 text-xl"></i>
                            <span class="text-sm font-medium text-gray-700">Kartu Keluarga</span>
                        </div>
                        <a href="{{ asset('storage/'.$applicant->kk_path) }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm">Lihat</a>
                    </div>

                    @if($applicant->skl_path)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="flex items-center">
                            <i class="fas fa-file-alt text-blue-500 mr-3 text-xl"></i>
                            <span class="text-sm font-medium text-gray-700">Ijazah / SKL</span>
                        </div>
                        <a href="{{ asset('storage/'.$applicant->skl_path) }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm">Lihat</a>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection