<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setting Pembayaran Tahunan') }}
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
                        <a href="{{ route('siswa.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Data kelas</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    @if ($errors->any())
    <div class="my-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg">
        <ul class="text-sm list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white p-4 my-4">
        <form id="formPembayaran" action="{{ route('setting-tahunan.store') }}" method="POST" class="w-full">
            @csrf
            <input type="hidden" name="jenis_pembayaran_id" value="{{ $pembayaran->id }}">

            <h1 class="text-lg font-semibold mb-4">
                Biaya - {{ $pembayaran->nama }} - {{ $pembayaran->periode->tahun_awal }}-{{ $pembayaran->periode->tahun_akhir }}
            </h1>

            <div class="flex flex-wrap gap-6">
                <div class="flex flex-col w-full md:w-3/12 gap-2">
                    <label class="text-sm font-medium">Tarif</label>
                    <input type="number" name="tarif" required class="block w-full p-2 text-sm border rounded-lg bg-gray-50" />
                </div>

                <div class="flex flex-col w-full md:w-3/12 gap-2">
                    <label class="text-sm font-medium">Kelas</label>
                    <select name="kelas_id" id="kelasSelect" required class="block w-full p-2 text-sm border rounded-lg bg-gray-50">
                        <option value="all" selected>Semua Kelas</option>
                        @foreach($kelasList as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-end gap-4 mt-4">
                    <a href="{{ route('jenis-pembayaran.index') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm">Kembali</a>
                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg text-sm">Simpan</button>
                </div>
            </div>

            <hr class="my-4 border-black">

            <div id="tabel-setting-container" class="mt-4">
                <!-- Tabel dinamis -->
            </div>
        </form>
    </div>
</x-app-layout>

@vite('resources/js/setting_pembayaran/tabel_tahunan.js')