@extends('layouts.web')

@section('title', 'Sejarah Sekolah')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Sejarah Sekolah</h2>

        @if ($sejarah)
        <div class="bg-white p-8 rounded-xl shadow">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('storage/' . $sejarah->image) }}" alt="Halaman Depan" class="w-full rounded-lg shadow">
                </div>
                <div class="w-full md:w-1/2">
                    <p class="text-lg leading-relaxed mb-4">
                        {{ $sejarah->isi }}
                    </p>
                </div>
            </div>
        </div>
        @else
        <div class=" text-red-700 p-6 rounded-lg text-center">
            Data sejarah sekolah tidak tersedia.
        </div>
        @endif

    </div>
</section>
@endsection