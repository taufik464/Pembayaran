@extends('layouts.admin')
@section('title', 'Kelola Berita')

@section('content')
<x-page-header
    title="Kelola Berita"
    :breadcrumb="[
       
        ['url' => '/admin/news', 'label' => 'Berita'],
    ]" />

<section class="bg-white p-5 rounded-lg shadow">

    {{-- Tombol Tambah Berita --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.news.create') }}"
           class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Berita
        </a>
    </div>

    {{-- Grid Card Berita --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($news as $item)
            <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col justify-between
                        hover:shadow-lg hover:scale-[1.02] transition-transform duration-200">

                {{-- Gambar --}}
                <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default.jpg') }}"
                     alt="Gambar {{ $item->judul }}"
                     class="w-full h-40 object-cover">

                {{-- Konten --}}
                <div class="p-4 flex flex-col flex-grow space-y-2">
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $item->judul }}
                    </h3>
                    <p class="text-gray-600 text-sm flex-grow">
                        {{ Str::limit($item->konten, 100) }}
                    </p>
                    <div class="flex justify-end items-center text-sm text-gray-500">
                        <span>{{ $item->penulis }}</span>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-between pt-2">
                        <a href="{{ route('admin.news.edit', $item->id) }}"
                           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus berita ini?')">
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
            <p class="text-gray-500">Belum ada berita.</p>
        @endforelse
    </div>

</section>
@endsection
