<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Pembayaran') }}
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
                        <a href="route('kelola-pembayaran.index')" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Kelola Pembayaran</a>
                    </div>
                </li>

            </ol>
        </nav>
    </x-slot>

    <div class="flex flex-row">
        <div class="basis-9/12 ">
            <form method="GET" action="{{ route('kelola-pembayaran.index') }}" class="flex items-center p-2 gap-2 bg-white rounded-md">
                <input type="text" name="nis" class="border px-2 py-1 rounded w-60" placeholder="Masukkan NIS" value="{{ request('nis') }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded">Cari</button>
            </form>
            @if ($siswa)
            <div class="flex items-start gap-4 bg-white p-4 rounded shadow mt-2">
                <div class="text-6xl text-gray-600">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="flex-1">
                    <div class="mt-1 ml-1 space-y-2 text-sm text-gray-700">
                        <div class="grid grid-cols-[min-content_auto] gap-x-2">
                            <div class="font-medium min-w-[60px]">Nama</div>
                            <div>: {{ $siswa->nama }}</div>

                            <div class="font-medium min-w-[60px]">NISN</div>
                            <div>: {{ $siswa->nis }}</div>

                            <div class="font-medium min-w-[60px]">Kelas</div>
                            <div>: {{ $siswa->kelas->nama }}</div> {{-- Pastikan relasi kelas ada --}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="w-full flex flex-col items-center mt-2  bg-white p-4 rounded shadow ">
                <!-- Tab Navigasi -->
                <div class="flex border border-black rounded-md p-1 overflow-hidden w-max mb-4">
                    <button onclick="showTab('bulanan')" id="btn-bulanan" class="tab-btn px-6 text-xs py-1 font-bold text-white bg-blue-400 rounded-md">Bulanan</button>
                    <button onclick="showTab('tahunan')" id="btn-tahunan" class="tab-btn ml-2 text-xs px-6 py-1 text-black hover:bg-gray-100">Tahunan</button>
                    <button onclick="showTab('tambahan')" id="btn-tambahan" class="tab-btn ml-2 text-xs px-6 py-1 text-black hover:bg-gray-100">Tambahan</button>
                </div>

                <!-- Konten di bawah tab -->
                <div class="w-full max-w-3xl bg-white  rounded shadow">
                    @include('staff.transaksi.tabel-transaksi', [
                    'bulanan' => $bulanan,
                    'tahunan' => $tahunan,
                    'tambahan' => $tambahan,
                    ])
                </div>
            </div>



        </div>
        <div class="basis-3/12 ml-4">
            <div class="h-400 bg-white p-4 rounded shadow">
                <div class="">
                    <h1 class="text-xl font-bold">Total Pembayaran</h1>
                    <h1 class="text-xl mt-1 font-bold">Rp. 200000</h1>

                    <button type="button" class="w-full mt-4  text-xl font-medium text-center text-white bg-primary hover:bg-green-500 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-1 text-center me-2 mb-2 ">Bayar</button>

                </div>
                <div class="mt-4 ">
                    <h1 class="text-xl font-bold">Daftar Pembayaran</h>
                </div>


            </div>

        </div>
    </div>
    </div>
</x-app-layout>

<script>
    function showTab(tab) {
        document.querySelectorAll('.table-content').forEach(el => el.style.display = 'none');
        document.getElementById('table-' + tab).style.display = 'block';

        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('bg-blue-400', 'text-white', 'font-bold');
            el.classList.add('text-black');
        });
        const activeBtn = document.getElementById('btn-' + tab);
        activeBtn.classList.add('bg-blue-400', 'text-white', 'font-bold');
        activeBtn.classList.remove('text-black');
    }

    // Tampilkan tabel Bulanan default saat halaman load
    document.addEventListener('DOMContentLoaded', () => {
        showTab('bulanan');
    });
</script>