@extends('layouts.web')

@section('title', 'Sejarah Sekolah')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Sejarah Sekolah</h2>
        <div class="bg-white p-8 rounded-xl shadow">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('/img/DepanSekolah.jpg') }}" alt="Halaman Depan" class="w-full rounded-lg shadow">
                    <p class="text-center text-sm text-gray-500 mt-2">Gedung SMA Al Hikmah tahun 1995</p>
                </div>
                <div class="w-full md:w-1/2">
                    <p class="text-lg leading-relaxed mb-4">
                        
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection