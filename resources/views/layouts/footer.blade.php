<footer class="bg-gray-900 text-white pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- Bagian 1: Logo dan Deskripsi -->
    <div>
      <div class="flex items-center space-x-3 mb-4">
        <img src="{{ asset('img/logo_alhikmah.jpg') }}" alt="Logo SMA Al Hikmah" class="w-10 h-10">
        <h3 class="text-xl font-bold">SMA Al Hikmah</h3>
      </div>
      <p class="text-gray-400 mb-4">Sekolah Islam Modern yang Membentuk Generasi Cerdas, Islami, dan Mandiri</p>
      <div class="flex space-x-4">
        <a href="https://www.facebook.com/smaalhikmahmuncar" class="text-gray-400 hover:text-white transition">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com/smaalhikmahmuncar?igsh=dDA3b2hneGtudXB5" class="text-gray-400 hover:text-white transition">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.youtube.com/@bilhikmah" class="text-gray-400 hover:text-white transition">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>

    <!-- Bagian 2: Tautan Cepat -->
    <div>
      <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
      <ul class="space-y-2">
        <li><a href="{{ route('beranda') }}" class="text-gray-400 hover:text-white transition">Beranda</a></li>
        <li><a href="{{ route('tentang') }}" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
        <li><a href="https://ppdb.smaalhikmah.sch.id/" class="text-gray-400 hover:text-white transition">PPDB</a></li>
      </ul>
    </div>

    <!-- Bagian 3: Kontak -->
    <div>
      <h4 class="text-lg font-semibold mb-4">Kontak</h4>
      <ul class="space-y-2">
        <li class="flex items-start">
          <i class="fas fa-map-marker-alt mt-1 mr-3 text-gray-400"></i>
          <span class="text-gray-400">Jl. KH Abdul Mannan No.RT. 006/12, Dusun Sidomulyo, Sumberberas, Kec. Muncar, Kabupaten Banyuwangi, Jawa Timur 68472</span>
        </li>
        <li class="flex items-start">
          <i class="fas fa-phone-alt mt-1 mr-3 text-gray-400"></i>
          <span class="text-gray-400">(022) 1234567</span>
        </li>
      </ul>
    </div>
  </div>

  <!-- Copyright -->
  <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
    <p>&copy; {{ date('Y') }} SMA Al Hikmah. All rights reserved.</p>
  </div>
</footer>
