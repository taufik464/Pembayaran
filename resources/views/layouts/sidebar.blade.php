<div x-data="{ open: false }" class="relative">
    {{-- Tombol burger (selalu tampil di semua device) --}}
    <div class="bg-white px-4 py-3 shadow-md flex items-center justify-between fixed top-0 left-0 right-0 z-40">
        <button @click="open = !open" class="text-gray-800 focus:outline-none">
            <i class="fas fa-bars fa-lg"></i>
        </button>
        <h1 class="text-lg font-semibold text-gray-700 tracking-wide">Menu</h1>
    </div>

    {{-- Overlay hitam --}}
    <div 
        x-show="open" 
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40"
        x-transition.opacity
    ></div>

    {{-- Sidebar utama --}}
    <div 
        class="fixed top-0 left-0 h-screen w-64 bg-green-800 text-white p-6 z-50 transform transition-transform duration-300 ease-in-out shadow-lg"
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
    >
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
        <nav class="space-y-3">
            <x-sidebar-link href="{{ route('dashboard') }}" icon="fas fa-tachometer-alt" :active="request()->is('dashboard')">
                Dashboard
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('profil.index') }}" icon="fas fa-newspaper" :active="request()->is('profil-sekolah')">
                Profil Sekolah
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('admin.ekstrakurikuler') }}" icon="fas fa-futbol" :active="request()->is('ekstrakurikuler')">
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
            <x-sidebar-link href="{{ route('admin.kontak') }}" icon="fas fa-users" :active="request()->is('pengguna')">
                Kontak
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
