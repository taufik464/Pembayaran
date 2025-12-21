@extends('layouts.admin')

{{-- Mengirimkan JUDUL ke layout --}}
@php
$title = 'Daftar PPDB';
$breadcrumb = [
['label' => 'Manajemen PPDB', 'url' => route('admin.ppdb.dashboard')],
['label' => 'Daftar Pendaftar', 'url' => route('admin.ppdb.list')],
];
@endphp

@section('content')
<div class="max-w-6xl mt-12 mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Pendaftar PPDB</h1>
            <p class="text-gray-500 text-sm">Total: {{ $list_pendaftar->total() }} pendaftar</p>
        </div>
        <a href="{{ route('ppdb.export') }}" class="bg-green-500 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl font-bold flex items-center shadow-lg transition-all">
            <i class="fas fa-file-excel mr-2"></i> Ekstrak ke Excel
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm overflow-hidden border border-gray-100">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-4 text-xs font-bold text-gray-400 uppercase">Nama / NIK</th>
                    <th class="p-4 text-xs font-bold text-gray-400 uppercase">Sekolah Asal</th>
                    <th class="p-4 text-xs font-bold text-gray-400 uppercase">Kontak</th>
                    <th class="p-4 text-xs font-bold text-gray-400 uppercase text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($list_pendaftar as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4">
                        <div class="font-bold text-gray-800 uppercase">{{ $item->nama }}</div>
                        <div class="text-xs text-gray-400">NIK: {{ $item->nik }}</div>
                    </td>
                    <td class="p-4 text-sm text-gray-600">{{ $item->asal_sekolah }}</td>
                    <td class="p-4 text-sm text-gray-600">
                        <a href="https://wa.me/{{ $item->no_hp }}" target="_blank" class="text-emerald-600 font-bold hover:underline">
                            <i class="fab fa-whatsapp"></i> {{ $item->no_hp }}
                        </a>
                    </td>
                   
                    <td class="p-4 text-center">
                        <a href="{{ route('admin.ppdb.show', $item->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-lg transition-all">
                            <i class="fas fa-eye mr-2"></i> Lihat Detail
                        </a>
                        
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-10 text-center text-gray-400 italic">Belum ada data pendaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4 bg-gray-50 border-t">
            {{ $list_pendaftar->links() }}
        </div>
    </div>
</div>
@endsection