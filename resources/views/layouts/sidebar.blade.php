<div class="sidebar bg-green-800 text-white w-64 h-screen p-5">
    <div class="text-center mb-5">
        <h2 class="text-xl font-bold"><i class="fas fa-school"></i></h2>
    </div>
    <nav>
        <x-sidebar-link href="{{ route('dashboard') }}" icon="fas fa-tachometer-alt" :active="request()->is('dashboard')">
            Dashboard
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('profil.index') }}" icon="fas fa-newspaper" :active="request()->is('profil-sekolah')">
            Profil Sekolah
        </x-sidebar-link>

        <x-sidebar-link href="{{ route('admin.ekstrakurikuler') }}" icon="fas fa-tachometer-alt" :active="false">
            Ekstrakurikuler
        </x-sidebar-link>

        <x-sidebar-link href="{{ route('admin.news') }}" icon="fas fa-images" :active="request()->is('Berita')">
            Berita
        </x-sidebar-link>

        <x-sidebar-link href="{{ route('admin.galeri') }}" icon="fas fa-images" :active="request()->is('galeri')">
            Galeri
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('admin.sarpras') }}" icon="fas fa-images" :active="request()->is('sarpras')">
            Sarpras
        </x-sidebar-link>
        
        <x-sidebar-link href="{{ route('achive.index') }}" icon="fas fa-images" :active="request()->is('achive')">
            Prestasi
        </x-sidebar-link>

        <x-sidebar-link href="#" icon="fas fa-users" :active="request()->is('pengguna')">
            Pengguna
        </x-sidebar-link>
        <x-sidebar-link href="#" icon="fas fa-cog" :active="request()->is('pengaturan')">
            Pengaturan
        </x-sidebar-link>
    </nav>
</div>
<style>
    /* Custom styles */
    .sidebar {
        transition: all 0.3s ease;
    }
</style>
