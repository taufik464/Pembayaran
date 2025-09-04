@extends('layouts.web')

@section('title', 'Ekstrakurikuler')

@section('content')
<section class="py-20 bg-gray-50">

  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Program Ekstrakurikuler</h2>
    <p class="text-center text-lg text-gray-600 mb-12">
      SMA Al Hikmah menyediakan berbagai program ekstrakurikuler untuk mengembangkan potensi siswa di bidang non-akademik, membentuk karakter tangguh, dan menyalurkan minat serta bakat secara positif.
    </p>

    <div class="grid md:grid-cols-3 gap-8">
      <!-- Ekstra 1 -->
      <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
        <img src="{{ asset('/img/Silat.png') }}" alt="Ekstrakurikuler Silat" class="w-full h-40 object-cover mb-4 rounded-lg">
        <h4 class="text-center font-bold text-xl mb-2 text-gray-800">Silat</h4>
        <p class="text-gray-600 text-sm">
          Program ekstrakurikuler silat tidak hanya mengajarkan teknik bela diri tradisional tetapi juga menanamkan nilai-nilai disiplin, keberanian, dan karakter kuat. Dibimbing oleh pelatih bersertifikat, siswa akan mempelajari jurus dasar, taktik pertahanan diri, serta filosofi hidup yang terkandung dalam seni bela diri. Kegiatan ini juga mempersiapkan siswa untuk mengikuti kejuaraan silat antar sekolah.
        </p>
      </div>

      <!-- Ekstra 2 -->
      <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
        <img src="{{ asset('/img/bulutangkis.jpg') }}" alt="Ekstrakurikuler Bulutangkis" class="w-full h-40 object-cover mb-4 rounded-lg">
        <h4 class="text-center font-bold text-xl mb-2 text-gray-800">Badminton</h4>
        <p class="text-gray-600 text-sm">
          Ekstrakurikuler badminton dirancang untuk mengasah keterampilan bermain bulutangkis mulai dari teknik dasar seperti grip, footwork, sampai strategi permainan tunggal dan ganda. Melalui program ini, siswa tidak hanya meningkatkan kebugaran jasmani tetapi juga belajar tentang sportivitas dan manajemen emosi dalam pertandingan. Fasilitas lapangan standar nasional tersedia untuk mendukung aktivitas latihan.
        </p>
      </div>

      <!-- Ekstra 3 -->
      <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
        <img src="{{ asset('/img/basket.jpg') }}" alt="Ekstrakurikuler Basket" class="w-full h-40 object-cover mb-4 rounded-lg">
        <h4 class="text-center font-bold text-xl mb-2 text-gray-800">Basket</h4>
        <p class="text-gray-600 text-sm">
          Ekstrakurikuler basket di sekolah kami membina siswa dalam penguasaan teknik dasar bola basket seperti dribbling, shooting, dan passing. Melalui latihan rutin seminggu dua kali, peserta akan mengembangkan kemampuan kerjasama tim, ketangkasan fisik, dan sportivitas. Kegiatan ini juga menjadi wadah untuk menemukan bakat-bakat baru melalui kompetisi antar kelas dan turnamen sekolah.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection