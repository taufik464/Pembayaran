@extends('layouts.web')
@section('title', 'Detail Alumni')
@section('content')
<section class="py-16 bg-gray-100">
    <section class="py-10 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">
                Detail Alumni
            </h2>

            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                {{-- Foto Alumni --}}
                <div class="w-full md:w-1/3 flex justify-center">
                    @if($alumni->foto)
                    <img src="{{ asset('storage/' . $alumni->foto) }}"
                        alt="{{ $alumni->nama }}"
                        class="w-64 h-64 object-cover rounded-lg shadow-lg">
                    @else
                    <img src="{{ asset('img/gambar_alumni.png') }}"
                        alt="{{ $alumni->nama }}"
                        class="w-64 h-64 object-cover rounded-lg shadow-lg">
                    @endif
                </div>

                {{-- Detail Alumni --}}
                <div class="w-full md:w-2/3">
                    <h3 class="text-2xl font-semibold mb-4">{{ $alumni->nama }}</h3>

                    <div class="space-y-4">
                        <div>
                            <h4 class="text-lg font-medium text-gray-700">Tahun Lulus</h4>
                            <p class="text-gray-600">{{ $alumni->tahun_lulus }}</p>
                        </div>

                        @if($alumni->kuliah)
                        <div>
                            <h4 class="text-lg font-medium text-gray-700">Pendidikan</h4>
                            <p class="text-gray-600">{{ $alumni->kuliah }}</p>
                            @if($alumni->tempat_kuliah)
                            <p class="text-gray-500">{{ $alumni->tempat_kuliah }}</p>
                            @endif
                        </div>
                        @endif

                        @if($alumni->pekerjaan)
                        <div>
                            <h4 class="text-lg font-medium text-gray-700">Pekerjaan</h4>
                            <p class="text-gray-600">{{ $alumni->pekerjaan }}</p>
                            @if($alumni->tempat_kerja)
                            <p class="text-gray-500">{{ $alumni->tempat_kerja }}</p>
                            @endif
                        </div>
                        @endif

                        @if($alumni->pesan)
                        <div>
                            <h4 class="text-lg font-medium text-gray-700">Pesan</h4>
                            <p class="text-gray-600 italic">{{ $alumni->pesan }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-12 text-center">
                <a href="{{ route('informasi.alumni') }}"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                    Kembali ke Daftar Alumni
                </a>
            </div>
        </div>
    </section>
</section>
@endsection