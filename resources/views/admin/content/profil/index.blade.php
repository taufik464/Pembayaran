@extends('layouts.admin')
@section('title', 'Profil Sekolah')

@section('content')
<x-page-header
    title="Profil Sekolah"
    :breadcrumb="[
        ['url' => '/dashboard', 'label' => 'Dashboard'],
        ['url' => '/admin/profilsekolah', 'label' => 'Profil Sekolah'],
    ]" />

<section class="bg-white p-5 rounded-lg shadow">

    {{-- Tombol Tambah Data --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('profil.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Data
        </a>
    </div>

    {{-- Grid Card --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($profil as $item)
        <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col justify-between
                    hover:shadow-lg hover:scale-[1.02] transition-transform duration-200">

            {{-- Gambar --}}
            <img src="{{ $item->image ? asset('storage/'.$item->image) : asset('images/default.jpg') }}"
                alt="Gambar {{ $item->judul }}"
                class="w-full h-40 object-cover">

            {{-- Konten --}}

            <div class="p-4 flex flex-col flex-grow space-y-2">
                <h3 class="text-lg font-semibold text-gray-800">
                    {{ $item->judul }}
                </h3>
                <div class="flex-grow ">
                    <p class="trix-content text-gray-600 text-sm flex-grow ">
                        {!! \Illuminate\Support\Str::limit(strip_tags($item->isi), 100, '...') !!}
                    </p>
                </div>


                {{-- Tombol Aksi --}}
                <div class="flex justify-between pt-2">
                    <a href="{{ route('profil.edit', $item->id) }}"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                        Edit
                    </a>
                    <form action="{{ route('profil.destroy', $item->id) }}" method="POST"
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
        <p class="text-gray-500">Belum ada data profil sekolah.</p>
        @endforelse
    </div>

</section>
@endsection