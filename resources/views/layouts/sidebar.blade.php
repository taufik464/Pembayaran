
       <div class="sidebar bg-green-800 text-white w-64 h-screen p-5">
            <div class="text-center mb-5">
                <h2 class="text-xl font-bold"><i class="fas fa-school"></i></h2>
            </div>
            <nav>
                <x-sidebar-link href="{{ route('dashboard') }}" icon="fas fa-tachometer-alt" :active="request()->is('dashboard')">
                    Dashboard
                </x-sidebar-link>
                <x-sidebar-link href="#" icon="fas fa-newspaper" :active="request()->is('artikel')">
                    Artikel
                </x-sidebar-link>
                <x-sidebar-link href="#" icon="fas fa-images" :active="request()->is('admin-dashboard*')">
                    Galeri
                </x-sidebar-link>
                <x-sidebar-link href="#" icon="fas fa-users" :active="request()->is('admin-dashboard*')">
                    Pengguna
                </x-sidebar-link>
                <x-sidebar-link href="#" icon="fas fa-cog" :active="request()->is('admin-dashboard*')">
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