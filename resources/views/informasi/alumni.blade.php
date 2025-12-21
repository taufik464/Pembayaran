@extends('layouts.web')
@section('title', 'Alumni')
@section('content')
<div class="container mt-5 mb-5">
    <h2 class="text-3xl font-bold text-center mb-12">
        Daftar Alumni
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($alumni as $item)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            {{-- Wrapper Gambar --}}
            <div class="relative w-full h-48 overflow-hidden">

                @if ($item->foto)
                {{-- KONDISI 1: FOTO ADA --}}
                <img
                    src="{{ asset('storage/' . $item->foto) }}"
                    alt="Foto {{ $item->nama }}"
                    class="absolute w-full h-48 object-cover transition-all duration-700 ease-in-out">
                @else
                {{-- KONDISI 2: FOTO TIDAK ADA (Placeholder SVG) --}}
                <div class="absolute w-full h-48 bg-gray-200 flex items-center justify-center">
                    {{-- Ikon SVG untuk Placeholder --}}
                    <svg class="w-16 h-16 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd" />
                    </svg>
                </div>
                @endif

            </div>

            <div class="p-4">
                {{-- Nama Alumni --}}
                <h3 class="text-xl font-semibold mb-2">{{ $item->nama }}</h3>

                {{-- Konten Kuliah/Pekerjaan --}}
                {{-- Menggunakan Str::limit untuk memotong konten dan mencegah error XSS dengan {!! !!} --}}
                <div class="text-gray-600 text-sm mb-4 line-clamp-4">
                    {!! \Illuminate\Support\Str::limit($item->kuliah, 150, '...') !!}
                </div>

                {{-- Tautan Baca Selengkapnya --}}
                <a href="{{ route('informasi.alumni.show', $item->id) }}"
                    class="text-blue-600 hover:underline">Baca Selengkapnya</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-6 flex justify-center">
        {{ $alumni->links() }}
    </div>
</div>
@endsection