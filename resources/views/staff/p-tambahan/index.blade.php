<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pembayaran Lain') }}
        </h2>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="route('p-tambahan.index')" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pembayaran lain</a>
                    </div>
                </li>

            </ol>
        </nav>
    </x-slot>




    <div class="bg-white rounded-lg text-gray-900 dark:text-gray-100">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 ">
            <div class="flex items-center justify-between">
                <div class="pb-4 bg-white dark:bg-gray-900">
                    <label for="tabl</div>e-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 rtl:inset-r-</div>0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text</div>-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                    </div>

                </div>
                <a href="{{  route('p-tambahan.create')}}" class="bg-blue-100 text-blue-600 px-4 py-2 rounded">Tambah Data</a>

            </div>
            <table class="w-full mt-2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lain as $l)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="NIS" class="px-6 py-1 font-xs text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-1">
                            {{ $l->nama }}
                        </td>
                        <td class="px-6 py-1">
                            {{ $l->harga }}
                        </td>
                        <td class="px-6 py-1">
                            {{ $l->deskripsi }}
                        </td>

                        <td class="px-2 py-2 relative" x-data="{ open: false }">
                            <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none">
                                &#8942; <!-- Tiga titik vertikal -->
                            </button>

                            <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-36 bg-white border rounded shadow-md">
                                <a href="{{ route('p-tambahan.edit', $l->id) }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</a>
                                <form action="{{ route('p-tambahan.destroy', $l->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</x-app-layout>