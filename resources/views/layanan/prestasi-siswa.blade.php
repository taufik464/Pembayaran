@extends('layouts.web')

@section('title', 'Prestasi Siswa')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Prestasi Siswa</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($prestasi as $item)
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <div class="flex items-center mb-4">
                    <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-trophy text-yellow-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">{{ $item->judul }}</h3>
                        <p class="text-sm text-gray-600">{{ $item->tingkat }} {{ $item->tahun }}</p>
                    </div>
                </div>
                <p class="text-gray-700">{{ $item->deskripsi }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
