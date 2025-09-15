@extends('layouts.web')

@section('title', 'Sarana Dan Prasarana')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Sarana dan Prasarana</h2>
        <!-- DETAIL FASILITAS -->


        <!-- LIHAT FASILITAS LAINNYA -->
        <div class="max-w-6xl mx-auto px-6 mt-10">


            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($sarpras as $item)
                <!-- CARD -->
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2 cursor-pointer"
                    x-data="{ open: false }">
                    <!-- Trigger -->
                    <img
                        src="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default-sapras.jpg') }}"
                        alt="{{ $item->judul }}"
                        class="rounded-t-xl w-full h-40 object-cover"
                        @click="open = true">
                    <div class="p-4">
                        <h3 class="text-blue-600 font-bold">{{ $item->judul }}</h3>
                        <p class="text-gray-500 text-sm">Laboratorium | Baik</p>
                    </div>

                    <!-- Modal -->
                    <div
                        x-show="open"
                        x-transition
                        x-cloak
                        @click.away="open = false"
                        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div class="bg-white p-4 rounded-xl shadow-xl max-w-lg w-full relative">
                            <!-- Tombol Close -->
                            <button
                                class="absolute top-2 right-2 text-gray-600 hover:text-black"
                                @click="open = false">
                                ✕
                            </button>

                            <!-- Konten Modal -->
                            <img
                                src="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default-sapras.jpg') }}"
                                alt="{{ $item->judul }}"
                                class="rounded-lg mb-4 w-full max-h-[80vh] object-contain mx-auto">
                            <h3 class="text-xl font-bold text-center text-blue-600">{{ $item->judul }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.zOdA5Z5N5HWTFcqw9vcDmgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Laboratorium Bahasa" class="rounded-t-xl">
                    <div class="p-4">
                        <h3 class="text-blue-600 font-bold">Laboratorium Bahasa</h3>
                        <p class="text-gray-500 text-sm">Laboratorium | Baik</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.zOdA5Z5N5HWTFcqw9vcDmgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Laboratorium Bahasa" class="rounded-t-xl">
                    <div class="p-4">
                        <h3 class="text-blue-600 font-bold">Laboratorium Bahasa</h3>
                        <p class="text-gray-500 text-sm">Laboratorium | Baik</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.zOdA5Z5N5HWTFcqw9vcDmgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Laboratorium Bahasa" class="rounded-t-xl">
                    <div class="p-4">
                        <h3 class="text-blue-600 font-bold">Laboratorium Bahasa</h3>
                        <p class="text-gray-500 text-sm">Laboratorium | Baik</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection