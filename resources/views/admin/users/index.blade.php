@extends('layouts.admin')
@section('title', 'User Management')
@section('content')
<x-page-header
    title="Manajemen Kontak"
    :breadcrumb="[
          
           
            ['url' => '/admin/kontak', 'label' => 'KONTAK'],
        ]" />


<section class=" relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-5">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.users.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
            + Tambah Data
        </a>
    </div>
    @if($user->isEmpty())
    <div class="text-center text-gray-500 py-10">
        Tidak ada data ekstrakurikuler.
    </div>
    @else
    @endif

    <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Role</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $usr)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $usr->id }}</td>
                <td class="px-6 py-4">{{ $usr->username }}</td>
                <td class="px-6 py-4">{{ $usr->email }}</td>
                <td class="px-6 py-4">{{ $usr->role }}</td>
                <td class="px-2 py-2 relative" x-data="{ open: false }">
                    <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none">
                        &#8942; <!-- Tiga titik vertikal -->
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-36 bg-white border rounded shadow-md">
                        <a href="{{ route('admin.users.edit', $usr->id) }}" class="w-full text-left block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</a>

                        <form action="{{ route('admin.users.destroy', $usr->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection