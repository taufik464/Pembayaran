@extends('layouts.web')

@section('title', 'Gallery')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Gallery</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($galleries as $item)
            <a href="{{ route('informasi.show', $item->information_id) }}" class="relative group block">
                <img src="{{ asset('storage/' . $item->image_path) }}"
                    alt="{{ $item->title }}"
                    class="w-full h-48 object-cover rounded-lg shadow hover:shadow-lg transition cursor-pointer">

                <!-- Overlay -->
                <div
                    class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition flex flex-col items-center justify-center rounded-lg p-4 text-center">
                    <p class="text-white font-semibold mb-2 ">{{ $item->information->title }}</p>
                    <p class="text-gray-200 text-sm line-clamp-3">{!! Str::limit(strip_tags($item->information->content), 50, '...') !!}</p>
                </div>
            </a>
            @endforeach
        </div>

        @if($galleries->isEmpty())
        <p class="text-center text-gray-500 mt-8">Belum ada gallery tersedia.</p>
        @endif

        <div class="mt-6 flex justify-center">
            {{ $galleries->links() }}
        </div>
    </div>
</section>

@endsection