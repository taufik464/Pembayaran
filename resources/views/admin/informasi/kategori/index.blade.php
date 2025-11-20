@extends('layouts.admin')
@php
$title = "Manajemen Kategori Informasi";
$breadcrumb = [
['label' => 'Kategori Informasi', 'url' => '/admin/kategori' ],
];
@endphp
@section('title', 'Kategori Informasi')

@section('content')

<section class="mt-20  relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-5">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.kategori.tambah') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Data
        </a>
    </div>
    <div class="">
        @if($kategori->isEmpty())
        <div class="text-center text-gray-500 py-10">
            Tidak ada data kategori informasi.
        </div>
        @else
        <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px- py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Kategori</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $kat)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 cursor-pointer hover:bg-gray-100 transition">
                    <td class="px- py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-blue-600"><a href="{{ route('admin.kategori.show', $kat->id) }}"> {{ $kat->name }}</a>

                    </td>
                    <td class="mr-4 px-2  py-2 text-right relative" x-data="{ open: false }" @click.stop>
                        <button @click="open = !open" class="text-gray-600 text-right hover:text-black focus:outline-none">
                            &#8942; <!-- Tiga titik vertikal -->
                        </button>

                        <div
                            x-show="open"
                            @click.away="open = false"
                            class="absolute text-left right-0 z-10 mt-2 w-36 bg-white border rounded shadow-md">
                            <a
                                href="{{ route('admin.kategori.edit', $kat->id) }}"
                                class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.kategori.destroy', $kat->id) }}"
                                method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        @endif
    </div>
</section>
@endsection