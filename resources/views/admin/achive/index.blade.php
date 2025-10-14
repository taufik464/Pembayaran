{{-- filepath: d:\Semester 5\Project\Pembayaran\resources\views\admin\achive\index.blade.php --}}
@extends('layouts.admin')
@section('title', 'Achive')
@section('content')
<x-page-header
    title="Manajemen Prestasi"
    :breadcrumb="[
       
        ['url' => route('achive.index'), 'label' => 'Prestasi'],
    ]" />

<section class="bg-white p-5 rounded-lg shadow">
    <div class="flex justify-end mb-4">
        <a href="{{ route('achive.create') }}"
           class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Data
        </a>
    </div>

    {{-- Prestasi Sekolah --}}
    <h3 class="text-2xl font-bold mb-4 text-green-700">Prestasi Sekolah</h3>
    @php
        $sekolah = $achives->where('jenis', 'sekolah');
    @endphp
    @if($sekolah->isEmpty())
        <div class="text-center text-gray-500 py-6">
            Tidak ada data prestasi sekolah.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6 mb-10">
            @foreach($sekolah as $a)
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition flex gap-6 items-start">
                    {{-- Gambar --}}
                    @if($a->gambar)
                        <img src="{{ asset('storage/' . $a->gambar) }}" alt="{{ $a->judul }}" class="w-40 h-40 object-cover rounded-lg">
                    @else
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    {{-- Konten Teks --}}
                    <div class="flex-1">
                        <h4 class="font-bold text-xl mb-2 text-gray-800">{{ $a->judul }}</h4>
                        <p class="text-gray-500 text-sm mb-2">
                            {{ $a->tanggal ? \Carbon\Carbon::parse($a->tanggal)->format('d M Y') : '-' }}
                        </p>
                        <p class="text-gray-600 text-sm line-clamp-3">
                            {{ Str::limit($a->deskripsi, 100) }}
                        </p>
                        <div class="mt-4 flex gap-10">
                            <a href="{{ route('achive.edit', $a->id) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('achive.destroy', $a->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Prestasi Siswa --}}
    <h3 class="text-2xl font-bold mb-4 text-blue-700">Prestasi Siswa</h3>
    @php
        $siswa = $achives->where('jenis', 'siswa');
    @endphp
    @if($siswa->isEmpty())
        <div class="text-center text-gray-500 py-6">
            Tidak ada data prestasi siswa.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6">
            @foreach($siswa as $a)
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition flex gap-6 items-start">
                    {{-- Gambar --}}
                    @if($a->gambar)
                        <img src="{{ asset('storage/' . $a->gambar) }}" alt="{{ $a->judul }}" class="w-40 h-40 object-cover rounded-lg">
                    @else
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    {{-- Konten Teks --}}
                    <div class="flex-1">
                        <h4 class="font-bold text-xl mb-2 text-gray-800">{{ $a->judul }}</h4>
                        <p class="text-gray-500 text-sm mb-2">
                            {{ $a->tanggal ? \Carbon\Carbon::parse($a->tanggal)->format('d M Y') : '-' }}
                        </p>
                        <p class="text-gray-600 text-sm line-clamp-3">
                            {{ Str::limit($a->deskripsi, 100) }}
                        </p>
                        <div class="mt-4 flex gap-10">
                            <a href="{{ route('achive.edit', $a->id) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('achive.destroy', $a->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>
@endsection
