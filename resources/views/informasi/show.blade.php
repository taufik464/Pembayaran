@extends('layouts.web')
@section('title', 'Informasi Sekolah')
@section('content')
<section class="py-16 bg-gray-100">
    <section class="py-10 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">
                {{ optional($informasi)->title ?? 'Judul belum tersedia' }}
            </h2>

            @if($informasi && $informasi->galleryInformasis->isNotEmpty())
            {{-- Carousel --}}
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach($informasi->galleryInformasis as $index => $image)
                    <div class="{{ $index === 0 ? '' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="{{ $informasi->title }}">
                    </div>
                    @endforeach
                </div>

                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
                    @foreach($informasi->galleryInformasis as $index => $image)
                    <button type="button"
                        class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-blue-600' : 'bg-gray-300' }}"
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"
                        data-carousel-slide-to="{{ $index }}"></button>
                    @endforeach
                </div>

                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                        <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                        <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            @else
            {{-- Gambar default jika galeri kosong --}}
            <div class="w-full mb-8 md:mb-0">
                <img src="{{ asset('images/default-informasi.jpg') }}"
                    alt="{{ $informasi->title }}"
                    class="w-full h-auto rounded-lg shadow-lg">
            </div>
            @endif

            {{-- Konten --}}
            <div class="mt-8 ql-editor max-w-4xl mx-auto">
                {!! optional($informasi)->content ?? '' !!}
            </div>
        </div>
    </section>
</section>
@endsection