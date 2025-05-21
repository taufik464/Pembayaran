<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Jenis Pembayaran Bulanan') }}
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
                        <a href="{{  route('jenis-pembayaran.index')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Detail jenis pembayaran</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>


    <div class="bg-white p-4 my-4">
        <div class="flex flex-col mb-4">
            <h1 class="text-lg font-semibold mb-1">
                @php
                $first = $bulanan->first();
                @endphp

                @if ($first)
                Biaya - {{ $first->jenisPembayaran->nama }} -
                {{ $first->jenisPembayaran->periode->tahun_awal }} -
                {{ $first->jenisPembayaran->periode->tahun_akhir }}

                @else
                Biaya tidak ditemukan.
                @endif
            </h1>
            <h1 class="text-lg font-semibold">
                @if ($first)
                {{ $first->siswa->nis }} - {{ $first->siswa->nama }} - {{ $first->siswa->kelas->nama }}
                @endif
            </h1>
        </div>
    </div>
    <div class="table-responsive px-2">
        <table class=" w-full text-left border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">NO</th>
                    <th class="px-4 py-2">Bulan</th>
                    <th class="px-4 py-2">Nominal</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bulanan as $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->bulan->nama }}</td>
                    <td class="px-2 py-2">{{ $item->harga }}</td>
                    <td class="px-2 py-2">{{ $item->status }}</td>
                    <td class="px-2 py-2 relative" x-data="{ open: false }">
                        <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none">
                            &#8942; <!-- Tiga titik vertikal -->
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-36 bg-white border rounded shadow-md">

                            <a href="{{ route('setting-bulanan.edit',$item->id) }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</a>
                            <form action="{{ route('setting-bulanan.destroy', ['nis' => $item->siswa_id, 'id' => $item->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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