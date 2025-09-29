@extends('layouts.web')

@section('title', 'Gallery')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Gallery</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($gallery as $item)
            <div class="relative group">
                <img src="{{ asset('storage/' . $item->gambar) }}"
                     alt="{{ $item->judul }}"
                     class="w-full h-48 object-cover rounded-lg shadow hover:shadow-lg transition cursor-pointer">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition flex flex-col items-center justify-center rounded-lg p-4 text-center">
                    <p class="text-white font-semibold mb-2">{{ $item->judul }}</p>
                    <p class="text-gray-200 text-sm">{{ $item->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
