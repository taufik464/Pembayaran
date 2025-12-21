 @php
 // Memanggil method statis dari Controller untuk mendapatkan data dropdown
 $profilJuduls = App\Http\Controllers\ProfileSekolahController::getJudulForNavbar();


 @endphp
 <header class="bg-gradient-to-r from-green-600 to-emerald-500 text-white shadow-lg sticky top-0 z-50 font-sans">
     <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
         <!-- Logo & Judul -->
         <div class="flex items-center space-x-3">
             <img src="{{ asset('/img/logo_alhikmah.jpg') }}"
                 alt="Logo SMA Al Hikmah"
                 class="w-12 h-12 rounded-full border-2 border-white shadow-md">
             <h1 class="text-xl md:text-2xl font-extrabold tracking-wide">SMA Al Hikmah Muncar</h1>
         </div>

         <!-- Desktop Menu -->
         <nav class="hidden md:flex space-x-8 text-sm font-semibold tracking-wide">
             <!-- Beranda -->
             <a href="{{ route('beranda') }}" class="px-3 py-2 rounded-lg hover:bg-green-700 transition font-bold">
                 Beranda
             </a>

             <!-- Profile Sekolah -->
             <div class="relative" x-data="{ open: false }">
                 <button @click="open = !open"
                     class="flex items-center px-3 py-2 rounded-lg hover:bg-green-700 transition font-bold">
                     <span>Profile Sekolah</span>
                     <svg class="w-4 h-4 ml-1 transition-transform duration-200"
                         :class="{ 'rotate-180': open }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M19 9l-7 7-7-7" />
                     </svg>
                 </button>
                 <div x-show="open" @click.away="open = false"
                     x-transition
                     class="absolute top-full left-0 mt-2 bg-white text-gray-800 rounded-md shadow-lg py-2 w-40 z-50 font-medium">
                     <a href="{{ route('tentang') }}" class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Tentang Kami</a>
                     <a href="{{ route('sambutan') }}" class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Sambutan</a>
                     <a href="{{ route('visi-misi') }}" class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Visi Misi</a>
                     <a href="{{ route('sejarah') }}" class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Sejarah</a>
                     @foreach ($profilJuduls as $judulItem)
                     @php
                     // Konversi spasi menjadi strip untuk URL yang bersih
                     $judul_striped = str_replace(' ', '-', $judulItem->judul);
                     @endphp

                     {{-- Gunakan $judul_striped untuk parameter route --}}
                     <a class="block px-4 py-2 hover:bg-green-100 hover:text-green-700" href="{{ route('profil-sekolah.show.striped', ['judul' => $judul_striped]) }}">
                         {{ $judulItem->judul }}
                     </a>



                     @endforeach
                 </div>
             </div>


             <!-- Informasi -->
             <div class="relative" x-data="{ open: false }">
                 <!-- Tombol Dropdown -->
                 <button @click="open = !open"
                     class="flex items-center px-3 py-2 rounded-lg hover:bg-green-700 transition font-bold text-white">
                     <span>Informasi</span>
                     <svg class="w-4 h-4 ml-1 transition-transform duration-200"
                         :class="{ 'rotate-180': open }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M19 9l-7 7-7-7" />
                     </svg>
                 </button>

                 <!-- Dropdown Menu -->
                 <div x-show="open" @click.away="open = false" x-transition
                     class="absolute top-full left-0 mt-2 bg-white text-gray-800 rounded-md shadow-lg py-2 w-56 z-50 font-medium">

                     <!-- 🔹 Menu Gallery -->
                     <a href="{{ route('informasi.gallery') }}"
                         class="block px-4 py-2 hover:bg-green-100 hover:text-green-700 border-b border-gray-100">
                         Gallery
                     </a>
                     <a href="{{ route('informasi.alumni') }}"
                         class="block px-4 py-2 hover:bg-green-100 hover:text-green-700 border-b border-gray-100">
                         Alumni
                     </a>

                     <!-- 🔹 Daftar Kategori Informasi -->
                     @foreach ($kategoriInformasis as $kategori)
                     <a href="{{ route('informasis.kategori', $kategori->name) }}"
                         class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">
                         {{ $kategori->name }}
                     </a>
                     @endforeach

                 </div>
             </div>




             <!-- Layanan -->
             <div class="relative" x-data="{ open: false }">
                 <button @click="open = !open"
                     class="flex items-center px-3 py-2 rounded-lg hover:bg-green-700 transition font-bold">
                     <span>Layanan</span>
                     <svg class="w-4 h-4 ml-1 transition-transform duration-200"
                         :class="{ 'rotate-180': open }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M19 9l-7 7-7-7" />
                     </svg>
                 </button>
                 <div x-show="open" @click.away="open = false"
                     x-transition
                     class="absolute top-full left-0 mt-2 bg-white text-gray-800 rounded-md shadow-lg py-2 w-40 z-50 font-medium">
                     <a href="{{ route('kontak') }}" class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Kontak</a>
                     <a href="https://sppalhikmah.web.id/" target="_blank" class="block px-4 py-2 hover:bg-green-100 hover:text-green-700">Administrasi</a>
                 </div>
             </div>

             <!-- PPDB (menu utama baru) -->
             <a href="{{ route('ppdb') }}" target="_blank"
                 class="px-4 py-2 text-center bg-white text-green-600 border-2 border-white rounded-full font-bold shadow-md transition hover:bg-green-600 hover:text-white">
                 PPDB Online
             </a>
         </nav>

         <!-- Mobile Menu Button -->
         <div class="md:hidden">
             <button id="mobile-menu-button" class="focus:outline-none">
                 <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 6h16M4 12h16m-7 6h7" />
                 </svg>
             </button>
         </div>
     </div>


     <!-- Mobile Menu -->
     <div id="mobile-menu" class="hidden bg-white text-gray-800 md:hidden px-6 pb-4 space-y-3 font-sans font-semibold tracking-wide">
         <a href="{{ route('beranda') }}" class="block py-2 hover:text-green-600">Beranda</a>

         <details>
             <summary class="cursor-pointer py-2">Profile Sekolah</summary>
             <a href="{{ route('tentang') }}" class="block pl-4 py-1 hover:text-green-600">Tentang Kami</a>
             <a href="{{ route('sambutan') }}" class="block pl-4 py-1 hover:text-green-600">Sambutan</a>
             <a href="{{ route('visi-misi') }}" class="block pl-4 py-1 hover:text-green-600">Visi Misi</a>
             <a href="{{ route('sejarah') }}" class="block pl-4 py-1 hover:text-green-600">Sejarah</a>
             @php
             // Memanggil method statis dari Controller untuk mendapatkan data dropdown
             $profilJuduls = App\Http\Controllers\ProfileSekolahController::getJudulForNavbar();
             @endphp
             @foreach ($profilJuduls as $judulItem)
             @php
             // Konversi spasi menjadi strip untuk URL yang bersih
             $judul_striped = str_replace(' ', '-', $judulItem->judul);
             @endphp

             {{-- Gunakan $judul_striped untuk parameter route --}}
             <a class="dropdown-item block pl-4 py-1 hover:text-green-600" href="{{ route('profil-sekolah.show.striped', ['judul' => $judul_striped]) }}">
                 {{ $judulItem->judul }}
             </a>

             @endforeach
         </details>


         <details>
             <summary class="cursor-pointer py-2">Informasi</summary>
             <a href="{{ route('informasi.gallery') }}" class="block pl-4 py-1 hover:text-green-600">Gallery</a>
             <a href="{{ route('informasi.alumni') }}" class="block pl-4 py-1 hover:text-green-600">Alumni</a>
             @foreach ($kategoriInformasis as $kategori)
             <a href="{{ route('informasi.kategori', $kategori->name) }}" class="block pl-4 py-1 hover:text-green-600">
                 {{ $kategori->name }}
             </a>
             @endforeach
         </details>
         <details>
             <summary class="cursor-pointer py-2">Layanan</summary>
             <a href="{{ route('kontak') }}" class="block pl-4 py-1 hover:text-green-600">Kontak</a>
             <a href="https://sppalhikmah.web.id/" class="block pl-4 py-1 hover:text-green-600">Administrasi</a>
         </details>



         <a href="https://ppdb.smaalhikmah.sch.id/" target="_blank" class="block text-center px-4 py-2 bg-white text-green-600 border-2 border-white rounded-full font-bold shadow-md transition hover:bg-green-600 hover:text-white">PPDB Online</a>
     </div>
 </header>

 <script>
     // Mobile menu toggle
     document.getElementById('mobile-menu-button').addEventListener('click', function() {
         document.getElementById('mobile-menu').classList.toggle('hidden');
     });
 </script>
 <script>
     fetch('/categories')
         .then(response => response.json())
         .then(data => console.log(data));
 </script>