<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SMA Al Hikmah</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-white text-gray-800">

 <!-- Navbar -->
  <header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-3">
        <img src="/img/logo_alhikmah.jpg" alt="Logo SMA Al Hikmah" class="w-10 h-10" />
        <h1 class="text-xl font-bold text-green-700">SMA Al Hikmah</h1>
      </div>
      <nav class="hidden md:flex space-x-6 text-sm font-medium text-gray-600">
        <a href="#beranda" class="hover:text-green-600">Beranda</a>
        <a href="#tentang" class="hover:text-green-600">Tentang</a>
        <a href="#program" class="hover:text-green-600">Program</a>
        <a href="#kontak" class="hover:text-green-600">Kontak</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
<section id="beranda" class="bg-cover bg-center bg-no-repeat text-white py-24 relative" style="background-image: url('/img/HalamanSekolah.jpg');">
  <div class="bg-black/60 absolute inset-0 z-0"></div> <!-- Overlay -->
  <div class="relative z-10 max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center">
    <div class="w-full md:w-1/2 mb-10 md:mb-0">
      <div class="bg-white/30 backdrop-blur-lg rounded-xl p-6 md:p-10 shadow-lg">
        <h2 class="text-4xl md:text-5xl font-bold leading-tight mb-4 text-white">
          Selamat Datang di <span class="text-yellow-300">SMA Al Hikmah</span>
        </h2>
        <p class="text-lg text-white mb-6">Sekolah Islam Modern yang Membentuk Generasi Cerdas, Islami, dan Mandiri</p>
        <a href="#tentang" class="bg-yellow-400 hover:bg-yellow-300 text-black px-6 py-3 rounded-full font-semibold transition">Pelajari Lebih Lanjut</a>
      </div>
    </div>
  </div>
</section>


  <!-- Tentang Kami -->
<section id="profil" class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Sambutan</h2>
        <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-8">
            <!-- Gambar Kepala Sekolah -->
            <div class="w-full md:w-1/3 mb-6 md:mb-0 flex flex-col items-center">
    <div class="w-32 h-32 md:w-40 md:h-40 overflow-hidden rounded-full shadow-lg">
        <img src="/img/KEPSEK.jpg" alt="Kepala Sekolah" class="w-full h-full object-cover">
    </div>
    <p class="text-center font-semibold mt-4">Kelompok 2, S.Pd. (Kepala Sekolah)</p>
</div>
            <!-- Deskripsi Tentang Kami -->
            <div class="w-full md:w-2/3">
                <p class="text-lg leading-relaxed text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nunc eu nisl. Sed euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nunc eu nisl.

Vivamus auctor, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nunc eu nisl. Sed euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nunc eu nisl.

Phasellus euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nunc eu nisl. Sed euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nunc eu nisl.                </p>
            </div>
        </div>
    </div>
</section>

  <!-- Program Unggulan -->
  <section id="program" class="py-20">
    <div class="max-w-6xl mx-auto px-6">
      <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Program Unggulan</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
          <img src="" class="w-16 mb-4" alt="">
          <h4 class="text-xl font-semibold mb-2">Pembinaan Akhlak</h4>
          <p class="text-gray-600">Program pembentukan karakter Islami melalui pembiasaan ibadah harian dan akhlak mulia.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
          <img src="" class="w-16 mb-4" alt="">
          <h4 class="text-xl font-semibold mb-2">Tahfidz & Keagamaan</h4>
          <p class="text-gray-600">Program unggulan hafalan Al-Qur'an dan kegiatan kajian Islam rutin.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
          <img src="" class="w-16 mb-4" alt="">
          <h4 class="text-xl font-semibold mb-2">Akademik & UTBK</h4>
          <p class="text-gray-600">Pembelajaran berkualitas, bimbingan UTBK dan olimpiade sains untuk prestasi akademik.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Ekstrakurikuler -->
<section id="ekstrakurikuler" class="py-20 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Ekstrakurikuler</h3>
    <div class="grid md:grid-cols-3 gap-8">
      <!-- Ekstra 1 -->
      <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
        <img src="" class="w-16 mb-4" alt="">
        <h4 class="text-xl font-semibold mb-2">Pramuka</h4>
        <p class="text-gray-600">Kegiatan kepramukaan yang melatih kemandirian, kerja sama, dan kepemimpinan siswa.</p>
      </div>

      <!-- Ekstra 2 -->
      <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
        <img src="" class="w-16 mb-4" alt="">
        <h4 class="text-xl font-semibold mb-2">Paskibra</h4>
        <p class="text-gray-600">Latihan baris-berbaris dan kedisiplinan untuk upacara serta lomba antar sekolah.</p>
      </div>

      <!-- Ekstra 3 -->
      <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
        <img src="" class="w-16 mb-4" alt="">
        <h4 class="text-xl font-semibold mb-2">English Club</h4>
        <p class="text-gray-600">Klub bahasa Inggris untuk meningkatkan kemampuan speaking, writing, dan grammar siswa.</p>
      </div>
    </div>
  </div>
</section>


  <!-- Berita Terkini -->
<section class="py-16 bg-gray-100" id="berita">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Berita Terkini</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      <!-- Berita 1 -->
      <div class="bg-white rounded-xl shadow p-6">
        <img src="" alt="Berita 1" class="mb-4 rounded-lg w-full object-cover h-40">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Kunjungan Industri ke PT Telkom</h3>
        <p class="text-sm text-gray-600">Siswa kelas 12 mengikuti kunjungan edukatif ke PT Telkom guna memahami dunia kerja dan teknologi.</p>
      </div>

      <!-- Berita 2 -->
      <div class="bg-white rounded-xl shadow p-6">
        <img src="" alt="Berita 2" class="mb-4 rounded-lg w-full object-cover h-40">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Juara 1 Lomba Tahfidz</h3>
        <p class="text-sm text-gray-600">Santri SMA Al Hikmah berhasil meraih juara dalam lomba tahfidz tingkat kabupaten.</p>
      </div>

      <!-- Berita 3 -->
      <div class="bg-white rounded-xl shadow p-6">
        <img src="" alt="Berita 3" class="mb-4 rounded-lg w-full object-cover h-40">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Peringatan Maulid Nabi</h3>
        <p class="text-sm text-gray-600">Kegiatan Maulid Nabi diisi dengan ceramah dan pentas seni Islami oleh siswa-siswi SMA Al Hikmah.</p>
      </div>
    </div>
  </div>
</section>



  <!-- Footer Baru -->
<footer class="bg-gray-900 text-white pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-5 gap-8 text-sm text-gray-300">
    <!-- Logo -->
    <div>
              <img src="/img/logo_alhikmah.jpg" alt="Logo SMA Al Hikmah" class="w-10 h-10" />
      <p>SMA AL HIKMAH</p>
    </div>

    <!-- Column 1 -->
    <div>
      <h3 class="font-semibold text-white mb-2">Weebly Themes</h3>
      <ul>
        <li><a href="#" class="hover:text-white">Pre-sale FAQs</a></li>
        <li><a href="#" class="hover:text-white">Submit a Ticket</a></li>
      </ul>
    </div>

    <!-- Column 2 -->
    <div>
      <h3 class="font-semibold text-white mb-2">Services</h3>
      <ul>
        <li><a href="#" class="hover:text-white">Theme Tweak</a></li>
      </ul>
    </div>

    <!-- Column 3 -->
    <div>
      <h3 class="font-semibold text-white mb-2">Showcase</h3>
      <ul>
        <li><a href="#" class="hover:text-white">Widgetkit</a></li>
        <li><a href="#" class="hover:text-white">Support</a></li>
      </ul>
    </div>

    <!-- Column 4 -->
    <div>
      <h3 class="font-semibold text-white mb-2">About Us</h3>
      <ul>
        <li><a href="#" class="hover:text-white">Contact Us</a></li>
        <li><a href="#" class="hover:text-white">Affiliates</a></li>
        <li><a href="#" class="hover:text-white">Resources</a></li>
      </ul>
    </div>
  </div>

  <div class="border-t border-gray-700 mt-10 pt-6">
    <!-- Social Icons -->
    <div class="flex justify-center space-x-4 mb-4">
      <a href="#" class="w-8 h-8 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-gray-900 transition">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" class="w-8 h-8 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-gray-900 transition">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="#" class="w-8 h-8 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-gray-900 transition">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="#" class="w-8 h-8 flex items-center justify-center border border-white rounded-full hover:bg-white hover:text-gray-900 transition">
        <i class="fab fa-google-plus-g"></i>
      </a>
    </div>
    <!-- Copyright -->
    <p class="text-center text-sm text-gray-400">&copy; 2025 SMA Al Hikmah. All rights reserved.</p>
  </div>
</footer>

<!-- Font Awesome CDN for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</body>
</html>
