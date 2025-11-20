@extends('layouts.admin')
@section('title', 'Data Alumni')
@php
$title = "Manajemen Data Alumni";
$breadcrumb = [
['url' => '/admin/alumni', 'label' => 'Data Alumni'],
];
@endphp
@section('content')
<div class="container bg-gray-200 mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="mb-5 justify-right flex">
           
            <a href="{{ route('admin.alumni.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Alumni</a>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                No
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Gambar
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nama
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Tahun Lulus
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Kuliah
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Pekerjaan
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumni as $item)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $loop->iteration + ($alumni->currentPage() - 1) * $alumni->perPage() }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default-alumni.jpg') }}"
                                    alt="{{ $item->nama }}" class="w-16 h-16 rounded-full object-cover">
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $item->nama }}
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $item->tahun_lulus }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $item->kuliah }} - {{ $item->tempat_kuliah }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $item->pekerjaan }} - {{ $item->tempat_kerja }}
                            </td>
                            <td class="relative px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div x-data="{ open: false }" class="relative inline-block text-left">
                                    <!-- Tombol titik tiga -->
                                    <button @click="open = !open" class="p-2 hover:bg-gray-200 rounded-full">
                                        &#8942; <!-- Icon titik tiga vertikal -->
                                    </button>

                                    <!-- Dropdown -->
                                    <div x-show="open"
                                        @click.away="open = false"
                                        x-transition
                                        class="absolute right-0 mt-2 w-32 bg-white shadow-lg border rounded z-50">

                                        <a href="{{ route('admin.alumni.edit', $item->id) }}"
                                            class="block px-4 py-2 text-sm hover:bg-gray-100">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.alumni.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                    {{ $alumni->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection