@extends('layouts.admin')
@section('title', 'Informasi Sekolah')
@section('content')
@php
$title = "Manajemen Informasi Sekolah";
$breadcrumb = [
['label' => 'Informasi Sekolah', 'url' => '/admin/informasi' ],
];
@endphp


<section class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg bg-white  p-5">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.informasi.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Data
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-4 gap-6">

        @forelse ($informasi as $item)
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-5"
            x-data="{ 
            current: 0, 
            images: {{ json_encode($item->galleryInformasis->pluck('image_path')) }} 
        }"
            x-init="if (images.length > 0) setInterval(() => { current = (current + 1) % images.length }, 5000)">

            {{-- Carousel Gambar --}}
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

                {{-- Jika tidak ada gambar --}}
                <template x-if="images.length === 0">
                    <img src="{{ asset('images/default-informasi.jpg') }}"
                        alt="{{ $item->title }}"
                        class="w-full h-48 object-cover">
                </template>
            </div>

            {{-- Konten --}}
            <div class="p-4 flex flex-col flex-grow space-y-2">
                <h3 class="text-lg font-semibold text-gray-800">{{ $item->title }}</h3>
                <div class="flex-grow">
                    <p class="trix-content text-gray-600 text-sm">
                        {!! \Illuminate\Support\Str::limit(strip_tags($item->content), 100, '...') !!}
                    </p>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-between pt-2">
                    <a href="{{ route('admin.informasi.edit', $item->id) }}"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                        Edit
                    </a>
                    <form action="{{ route('admin.informasi.destroy', $item->id) }}" method="POST"
                        onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p class="text-gray-500">Belum ada informasi sekolah.</p>
        @endforelse
    </div>
    
</section>
@endsection