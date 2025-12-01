<div x-data="{ open: false }" class="relative">
    {{-- Tombol burger (selalu tampil di semua device) --}}

    <div x-cloak class="bg-white h-auto px-4 py-3 shadow-md flex items-center justify-between fixed top-0 left-0 right-0 z-50">
        <button @click.prevent="open = !open" class="mr-4 text-gray-800 focus:outline-none" aria-label="Toggle sidebar">
            <i class="fas fa-bars fa-lg"></i>
        </button>

        <x-application-logo class="ml-4 h-8 w-auto" />


        {{-- JUDUL DAN BREADCRUMB (Tengah) --}}
        <div class=" ml-4 flex-1 text-left">

            @isset($title)
            <h1 class="text-xl font-bold text-green-800">{{ $title }}</h1>
            @endisset

            @isset($breadcrumb)
            <nav class="flex text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/dashboard" class="text-xs font-medium text-gray-700 hover:text-blue-600">Dashboard</a>
                    </li>

                    {{-- Breadcrumb Loop --}}
                    @foreach ($breadcrumb as $item)
                    <li>
                        <div class="flex items-center">
                            <span class="text-gray-400">/ </span>
                            <a href="{{ $item['url'] }}" class="text-xs font-medium text-gray-700 hover:text-blue-600">{{ $item['label'] }}</a>
                        </div>
                    </li>
                    @endforeach
                </ol>
            </nav>
            @endisset
        </div>

        {{-- TOMBOL KELUAR (Kanan Jauh) --}}
        @auth
        {{-- Ambil objek pengguna yang sedang login --}}
        @php
        $user = auth()->user();

        // Pastikan $user ada sebelum memproses
        if ($user) {
        $fullName = $user->name ?? 'NN';
        $nameParts = explode(' ', trim($fullName));
        $initials = 'U'; // Default inisial

        // --- 1. Logika Inisial DUA HURUF ---
        if (count($nameParts) >= 2) {
        $initials = strtoupper(substr($nameParts[0], 0, 1) . substr($nameParts[1], 0, 1));
        } else {
        $initials = strtoupper(substr($nameParts[0], 0, 2));
        }

        // --- 2. Logika Warna Dinamis ---
        $colors = [
        'bg-red-500',
        'bg-blue-500',
        'bg-green-500',
        'bg-indigo-500',
        'bg-purple-500',
        'bg-pink-500',
        'bg-teal-500',
        'bg-yellow-500'
        ];

        // Mendapatkan indeks warna berdasarkan panjang nama (konsisten per user)
        $colorIndex = strlen($fullName) % count($colors);
        $bgColorClass = $colors[$colorIndex];
        } else {
        // Default jika tidak ada user yang login (seharusnya tidak terjadi di sini karena ada @auth)
        $initials = 'NA';
        $bgColorClass = 'bg-gray-600';
        }
        @endphp

        {{-- Tombol Dropdown User Menu --}}
        <div class="flex items-center ">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>

                @if ($user->foto ?? null) {{-- Menggunakan null-coalescing untuk safety --}}
                {{-- KONDISI 1: FOTO ADA --}}
                <img class="w-8 h-8 rounded-full object-cover"
                    src="{{ asset('storage/' . $user->foto) }}"
                    alt="Foto {{ $user->name }}">
                @else
                {{-- KONDISI 2: FOTO TIDAK ADA, TAMPILKAN INISIAL TEKS DENGAN WARNA DINAMIS --}}
                <span class="flex items-center justify-center w-8 h-8 rounded-full {{ $bgColorClass }} text-white font-semibold text-xs leading-none">
                    {{ $initials }}
                </span>
                @endif

            </button>

            {{-- Contoh Menampilkan Nama Pengguna (Dropdown Content) --}}
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                    {{-- Menggunakan variabel $user yang sudah didefinisikan --}}
                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                        {{ $user->name }}
                    </p>
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        {{ $user->email }}
                    </p>
                </div>
                <ul class="py-1" role="none">
                    <li>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endauth
    </div>




    {{-- Overlay hitam --}}
    <div
        x-show="open"
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40"
        x-transition.opacity></div>

    {{-- Sidebar utama --}}
    <div
        class="fixed top-0 left-0 h-screen w-64 bg-green-800 text-white p-6 z-50 transform transition-transform duration-300 ease-in-out shadow-lg"
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full">
        {{-- Header sidebar --}}
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl font-bold flex items-center space-x-2">
                <i class="fas fa-school"></i>
                <span>SMA Al Hikmah</span>
            </h2>

            {{-- Tombol close (X) --}}
            <button @click="open = false" class="text-white hover:text-gray-300">
                <i class="fas fa-times fa-lg"></i>
            </button>
        </div>

        {{-- Menu navigasi --}}
        <nav class="overflow-y-auto" style="max-height: calc(100vh - 160px);">
            <x-sidebar-link href="{{ route('dashboard') }}" icon="fas fa-tachometer-alt" :active="request()->is('dashboard')">
                Dashboard
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('profil.index') }}" icon="fas fa-newspaper" :active="request()->is('profil-sekolah')">
                Profil Sekolah
            </x-sidebar-link>
            {{-- <x-sidebar-link href="{{ route('admin.ekstrakurikuler') }}" icon="fas fa-futbol" :active="request()->is('ekstrakurikuler')">
            Ekstrakurikuler
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('admin.news') }}" icon="fas fa-newspaper" :active="request()->is('Berita')">
                Berita
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('admin.galeri') }}" icon="fas fa-images" :active="request()->is('galeri')">
                Galeri
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('admin.sarpras') }}" icon="fas fa-building" :active="request()->is('sarpras')">
                Sarpras
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('achive.index') }}" icon="fas fa-trophy" :active="request()->is('achive')">
                Prestasi
            </x-sidebar-link>
            --}}
            <x-sidebar-link href="{{ route('admin.kontak') }}" icon="fas fa-users" :active="request()->is('pengguna')">
                Kontak
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('admin.kategori') }}" icon="fas fa-users" :active="request()->is('pengguna')">
                kategori Informasi
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('admin.informasi') }}" icon="fas fa-info-circle" :active="request()->is('informasi')">
                Informasi Sekolah
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('admin.alumni') }}" icon="fas fa-user-graduate" :active="request()->is('alumni')">
                Data Alumni
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('admin.faq') }}" icon="fas fa-question-circle" :active="request()->is('faq')">
                FAQ
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('admin.users') }}" icon="fas fa-users" :active="request()->is('user')">
                User
            </x-sidebar-link>
            <x-sidebar-link href="#" icon="fas fa-cog" :active="request()->is('pengaturan')">
                Pengaturan
            </x-sidebar-link>
        </nav>
    </div>
</div>

{{-- Styling tambahan --}}
<style>
    nav .sidebar-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 14px;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    nav .sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        transform: translateX(4px);
    }

    nav .sidebar-link i {
        width: 18px;
        opacity: 0.9;
    }
</style>

{{-- Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>