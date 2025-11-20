@extends('layouts.web')
@section('title', 'Informasi Sekolah')
@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">{{ $kategori->name}}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($informasi as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden"
                x-data="{ 
        current: 0, 
        images: {{ json_encode($item->galleryInformasis->pluck('image_path')) }} 
     }"
                x-init="if (images.length > 0) setInterval(() => { current = (current + 1) % images.length }, 5000)">

                {{-- Wrapper Gambar --}}
                <div class="relative w-full h-48 overflow-hidden">
                    <template x-for="(image, index) in images" :key="index">
                        <img
                            :src="'{{ asset('storage') }}/' + image"
                            alt="{{ $item->title }}"
                            class="absolute w-full h-48 object-cover transition-all duration-700 ease-in-out"
                            :class="{
                    'translate-x-0 opacity-100': current === index,
                    '-translate-x-full opacity-0': current > index,
                    'translate-x-full opacity-0': current < index
                }">
                    </template>

                    {{-- Jika tidak ada gambar di galeri --}}
                    <template x-if="images.length === 0">
                        <img src="{{ asset('images/default-informasi.jpg') }}"
                            alt="{{ $item->title }}"
                            class="w-full h-48 object-cover">
                    </template>
                </div>

                {{-- Konten Informasi --}}
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                    <div class="text-gray-600 text-sm mb-4 line-clamp-4">
                        {!! \Illuminate\Support\Str::limit($item->content, 150, '...') !!}
                    </div>
                    <a href="{{ route('informasi.show', $item->id) }}"
                        class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>


            {{-- Tambahkan Alpine.js sekali di layout utama --}}
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

            @endforeach
        </div>
        <div class="mt-6 flex justify-center">
            {{ $informasi->links() }}
        </div>
</section>
@endsection