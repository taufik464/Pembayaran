<header class="bg-gradient-to-r from-green-900 to-green-500 sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

        <!-- Logo + Nama Sekolah -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('img/logo_alhikmah.jpg') }}" alt="Logo SMA Al Hikmah"
                class="w-10 h-10 rounded-full ring-2 ring-white">
            <h1 class="text-lg md:text-xl font-bold text-white">SMA Al Hikmah Muncar</h1>
        </div>

        <!-- Menu Normal (selalu terlihat di semua layar) -->
        <nav class="flex space-x-6 text-sm md:text-base font-semibold text-white">
            <!-- Beranda Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-yellow-300 flex items-center transition">
                    Beranda
                    <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="absolute bg-white text-gray-700 rounded-md shadow-lg mt-2 py-2 w-48 z-50 origin-top transform transition">
                    <a href="{{ route('beranda') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Beranda Utama</a>
                    <a href="{{ route('tentang') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Tentang Kami</a>
                    <a href="{{ route('ekstrakurikuler') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Ekstrakurikuler</a>
                    <a href="{{ route('berita') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Berita</a>
                </div>
            </div>

            <!-- Profile Sekolah Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-yellow-300 flex items-center transition">
                    Profile Sekolah
                    <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="absolute bg-white text-gray-700 rounded-md shadow-lg mt-2 py-2 w-48 z-50 origin-top transform transition">
                    <a href="{{ route('sambutan') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Sambutan</a>
                    <a href="{{ route('visi-misi') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Visi Misi</a>
                    <a href="{{ route('sejarah') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Sejarah</a>
                </div>
            </div>

            <!-- Informasi Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-yellow-300 flex items-center transition">
                    Informasi
                    <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="absolute bg-white text-gray-700 rounded-md shadow-lg mt-2 py-2 w-48 z-50 origin-top transform transition">
                    <a href="{{ route('gallery') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Gallery</a>
                    <a href="{{ route('ppdb') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">PPDB</a>
                </div>
            </div>

            <!-- Layanan Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-yellow-300 flex items-center transition">
                    Layanan
                    <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="absolute bg-white text-gray-700 rounded-md shadow-lg mt-2 py-2 w-56 z-50 origin-top transform transition">
                    <a href="{{ route('kontak') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Kontak</a>
                    <a href="{{ route('prestasi-sekolah') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Prestasi Sekolah</a>
                    <a href="{{ route('prestasi-siswa') }}"
                        class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Prestasi Siswa</a>
                </div>
            </div>
        </nav>
    </div>
</header>
