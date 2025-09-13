<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('img/logo_alhikmah.jpg') }}" alt="Logo SMA Al Hikmah" class="w-10 h-10">
            <h1 class="text-xl font-bold text-green-700">SMA Al Hikmah Muncar</h1>
        </div>
        <nav class="hidden md:flex space-x-6 text-sm font-medium text-gray-600">
            <!-- Beranda Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-green-600 flex items-center focus:outline-none">
                    Beranda
                    <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-md mt-2 py-1 w-48 z-50 transition-all duration-300 origin-top">
                    <a href="{{ route('beranda') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Beranda Utama</a>
                    <a href="{{ route('tentang') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Tentang Kami</a>
                    <a href="{{ route('ekstrakurikuler') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Ekstrakurikuler</a>
                    <a href="{{ route('berita') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Berita</a>
                </div>
            </div>

            <!-- Profile Sekolah Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-green-600 flex items-center focus:outline-none">
                    Profile Sekolah
                    <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-md mt-2 py-1 w-48 z-50 transition-all duration-300 origin-top">
                    <a href="{{ route('sambutan') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Sambutan</a>
                    <a href="{{ route('visi-misi') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Visi Misi</a>
                    <a href="{{ route('sejarah') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Sejarah</a>
                </div>
            </div>

            <!-- Informasi Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-green-600 flex items-center focus:outline-none">
                    Informasi
                    <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-md mt-2 py-1 w-48 z-50 transition-all duration-300 origin-top">
                    <a href="{{ route('gallery') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Gallery</a>
                    <a href="{{ route('sarpras') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Gallery</a>
                    <a href="{{ route('ppdb') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">PPDB</a>
                </div>
            </div>

            <!-- Layanan Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-green-600 flex items-center focus:outline-none">
                    Layanan
                    <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute bg-white shadow-lg rounded-md mt-2 py-1 w-48 z-50 transition-all duration-300 origin-top">
                    <a href="{{ route('kontak') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Kontak</a>
                    <a href="{{ route('prestasi-sekolah') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Prestasi Sekolah</a>
                    <a href="{{ route('prestasi-siswa') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-green-600">Prestasi Siswa</a>
                </div>
            </div>
        </nav>
    </div>
</header>
