@extends('layouts.web')

@section('title', 'PPDB')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Penerimaan Peserta Didik Baru</h2>
        <div class="bg-green-50 rounded-xl p-8 shadow">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">Jadwal PPDB {{ $ppdb->tahun }}</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <span class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-1 flex-shrink-0">1</span>
                            <span>Pendaftaran Gelombang 1: {{ $ppdb->tanggal_mulai->format('d M Y') }} - {{ $ppdb->tanggal_selesai->format('d M Y') }}</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-1 flex-shrink-0">2</span>
                            <span>Pengumuman: {{ $ppdb->tanggal_pengumuman->format('d M Y') }}</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-1 flex-shrink-0">3</span>
                            <span>Daftar Ulang: {{ $ppdb->tanggal_daftar_ulang->format('d M Y') }}</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Persyaratan</h3>
                    <ul class="list-disc pl-5 space-y-2">
                        @foreach(explode("\n", $ppdb->persyaratan) as $syarat)
                            <li>{{ $syarat }}</li>
                        @endforeach
                    </ul>
                    <a href="#" class="mt-6 inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
