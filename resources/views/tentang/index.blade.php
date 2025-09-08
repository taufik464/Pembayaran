@extends('layouts.web')

@section('title', 'Tentang Kami')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Tentang Kami</h2>
        @if ($tentang)
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <p class="text-lg leading-relaxed mb-4">
                    {{ $tentang->isi }}
                </p>

            </div>
            <div class="rounded-xl overflow-hidden w-64 shadow-lg mr-auto ml-auto">
                <img src="{{ $tentang->image ? asset('storage/' . $tentang->image) : asset('images/default-kepala-sekolah.jpg') }}" alt="Kelas SMA Al Hikmah" class="w-64 h-64 object-cover">
            </div>
        </div>
        @else
        <div class=" text-red-700 p-6 rounded-lg text-center">
            Data tentang kami tidak tersedia.
        </div>
        @endif
    </div>
</section>
@endsection