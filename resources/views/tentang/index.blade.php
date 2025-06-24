@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Tentang Kami</h2>
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <p class="text-lg leading-relaxed mb-4">
                    SMA Al Hikmah adalah sekolah Islam modern yang berkomitmen untuk memberikan pendidikan berkualitas dengan mengintegrasikan nilai-nilai Islam dalam setiap aspek pembelajaran.
                </p>
                <p class="text-lg leading-relaxed">
                    Kami memiliki fasilitas lengkap dan tenaga pengajar profesional yang siap membimbing siswa menjadi generasi yang cerdas, berakhlak mulia, dan mandiri.
                </p>
            </div>
            <div class="rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('img/KEPSEK.jpg') }}" alt="Kelas SMA Al Hikmah" class="w-full h-64 object-cover">
            </div>
        </div>
    </div>
</section>
@endsection
