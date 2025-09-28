@extends('layouts.web')

@section('title', 'Prestasi')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Daftar Prestasi</h2>

        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            @forelse($prestasi as $item)
            <div class="flex bg-white rounded-1xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">

                {{-- Gambar --}}
                <div class="flex-shrink-0 w-1/3">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-auto h-auto object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif
                </div>

                {{-- Konten --}}
                <div class="p-4 flex flex-col justify-between w-2/3 relative">
                    <h3 class="text-xl font-semibold mb-4">{{ $item->judul }}</h3>

                    {{-- Deskripsi --}}
                    <p class="text-gray-700 text-sm line-clamp-3 mb-4">
                        {{ Str::limit($item->deskripsi, 150, '...') }}
                    </p>

                    {{-- Tingkat --}}
                    <p class="text-gray-600 text-sm mb-2">
                        <span class="font-semibold">Tingkat:</span> {{ $item->tingkat ?? '-' }}
                    </p>

                    {{-- Garis pemisah Tingkat - Tanggal --}}
                    <div class="border-t border-gray-300 mb-2"></div>

                    {{-- Tanggal dengan ikon kalender --}}
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>
                            {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                        </span>
                    </div>

                    {{-- Tombol Modern Polos dengan Icon Panah --}}
                    <div class="flex justify-end mt-4">
                        <button class="inline-flex items-center text-gray-700 text-sm font-medium hover:text-gray-900 transition">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <p class="col-span-1 text-center text-gray-500">Data prestasi tidak ditemukan.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
