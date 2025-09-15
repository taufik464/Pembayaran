<header 
  x-data="{ scrolled: false, mobileOpen: false }"
  @scroll.window="scrolled = window.scrollY > 20"
  class="fixed w-full top-0 z-50 transition">

  <!-- Navbar Container -->
  <div :class="scrolled ? 'bg-white shadow-md' : 'bg-green-700/80'" 
       class="transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

      <!-- Logo -->
      <div class="flex items-center space-x-3">
        <img src="{{ asset('img/logo_alhikmah.jpg') }}" alt="Logo" class="w-10 h-10 rounded-full">
        <span :class="scrolled ? 'text-green-700' : 'text-white'" 
              class="font-bold text-lg md:text-xl transition-colors">
          SMA Al Hikmah
        </span>
      </div>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex items-center space-x-8 font-medium">

        <!-- Beranda Dropdown -->
        <div class="relative group" x-data="{ open: false }">
          <button @click="open = !open" 
            :class="scrolled ? 'text-gray-700 hover:text-green-600' : 'text-white hover:text-green-200'" 
            class="flex items-center transition">
            Beranda
            <svg class="w-4 h-4 ml-1 transition-transform duration-300"
                 :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div x-show="open" @click.away="open = false"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 translate-y-2"
               x-transition:enter-end="opacity-100 translate-y-0"
               class="absolute bg-white shadow-xl rounded-lg mt-3 py-2 w-56 z-50">
            <a href="{{ route('beranda') }}" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">Beranda Utama</a>
            <a href="{{ route('tentang') }}" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">Tentang Kami</a>
            <a href="{{ route('ekstrakurikuler') }}" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">Ekstrakurikuler</a>
            <a href="{{ route('berita') }}" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">Berita</a>
          </div>
        </div>

        <!-- Profil Sekolah Dropdown (Megamenu) -->
        <div class="relative group" x-data="{ open: false }">
          <button @click="open = !open" 
            :class="scrolled ? 'text-gray-700 hover:text-green-600' : 'text-white hover:text-green-200'" 
            class="flex items-center transition">
            Profil Sekolah
            <svg class="w-4 h-4 ml-1 transition-transform duration-300"
                 :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div x-show="open" @click.away="open = false"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 translate-y-2"
               x-transition:enter-end="opacity-100 translate-y-0"
               class="absolute bg-white shadow-xl rounded-lg mt-3 py-4 px-6 w-96 grid grid-cols-2 gap-4 z-50">
            <a href="{{ route('sambutan') }}" class="hover:text-green-600">Sambutan</a>
            <a href="{{ route('visi-misi') }}" class="hover:text-green-600">Visi Misi</a>
            <a href="{{ route('sejarah') }}" class="hover:text-green-600">Sejarah</a>
            <a href="{{ route('prestasi-sekolah') }}" class="hover:text-green-600">Prestasi</a>
          </div>
        </div>

        <!-- Informasi Dropdown -->
        <div class="relative group" x-data="{ open: false }">
          <button @click="open = !open" 
            :class="scrolled ? 'text-gray-700 hover:text-green-600' : 'text-white hover:text-green-200'" 
            class="flex items-center transition">
            Informasi
            <svg class="w-4 h-4 ml-1 transition-transform duration-300"
                 :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div x-show="open" @click.away="open = false"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 translate-y-2"
               x-transition:enter-end="opacity-100 translate-y-0"
               class="absolute bg-white shadow-xl rounded-lg mt-3 py-2 w-56 z-50">
            <a href="{{ route('gallery') }}" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">Gallery</a>
            <a href="https://ppdb.smaalhikmah.sch.id/" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">PPDB</a>
          </div>
        </div>

        <!-- Layanan Dropdown -->
        <div class="relative group" x-data="{ open: false }">
          <button @click="open = !open" 
            :class="scrolled ? 'text-gray-700 hover:text-green-600' : 'text-white hover:text-green-200'" 
            class="flex items-center transition">
            Layanan
            <svg class="w-4 h-4 ml-1 transition-transform duration-300"
                 :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div x-show="open" @click.away="open = false"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 translate-y-2"
               x-transition:enter-end="opacity-100 translate-y-0"
               class="absolute bg-white shadow-xl rounded-lg mt-3 py-2 w-56 z-50">
            <a href="{{ route('kontak') }}" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">Kontak</a>
            <a href="{{ route('prestasi-sekolah') }}" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">Prestasi Sekolah</a>
            <a href="{{ route('prestasi-siswa') }}" class="block px-5 py-2 hover:bg-green-50 hover:text-green-600">Prestasi Siswa</a>
          </div>
        </div>

        <!-- CTA -->
        <a href="https://ppdb.smaalhikmah.sch.id/" 
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-full shadow transition">
          PPDB Online
        </a>
      </nav>

      <!-- Mobile Toggle -->
      <button @click="mobileOpen = !mobileOpen" class="md:hidden focus:outline-none">
        <svg :class="scrolled ? 'text-gray-700' : 'text-white'" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="mobileOpen" 
       x-transition:enter="transition ease-out duration-300" 
       x-transition:enter-start="opacity-0 translate-x-full" 
       x-transition:enter-end="opacity-100 translate-x-0" 
       x-transition:leave="transition ease-in duration-200" 
       x-transition:leave-start="opacity-100 translate-x-0" 
       x-transition:leave-end="opacity-0 translate-x-full"
       class="fixed inset-0 bg-black bg-opacity-50 flex justify-end md:hidden z-40">

    <div class="bg-white w-72 h-full shadow-xl p-6 space-y-4 overflow-y-auto">
      <a href="{{ route('beranda') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Beranda</a>
      <a href="{{ route('tentang') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Tentang Kami</a>
      <a href="{{ route('ekstrakurikuler') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Ekstrakurikuler</a>
      <a href="{{ route('berita') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Berita</a>
      <a href="{{ route('sambutan') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Sambutan</a>
      <a href="{{ route('visi-misi') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Visi Misi</a>
      <a href="{{ route('sejarah') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Sejarah</a>
      <a href="{{ route('kontak') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Kontak</a>
      <a href="{{ route('prestasi-sekolah') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Prestasi Sekolah</a>
      <a href="{{ route('prestasi-siswa') }}" class="block py-2 border-b text-gray-700 hover:text-green-600">Prestasi Siswa</a>
      <a href="https://ppdb.smaalhikmah.sch.id/" class="block bg-green-600 text-white px-4 py-2 rounded text-center">PPDB Online</a>
    </div>
  </div>
</header>
