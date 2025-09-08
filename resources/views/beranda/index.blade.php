@extends('layouts.web')

@section('title', 'Beranda')

@section('content')
<section class="bg-cover bg-center bg-no-repeat text-white py-24 relative" style="background-image: url('{{ asset('img/HalamanSekolah.jpg') }}');">
  <div class="bg-black/60 absolute inset-0 z-0"></div>
  <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 flex flex-col md:flex-row items-center gap-8">
    <div class="w-full md:w-1/2">
      <div class="bg-white/30 backdrop-blur-lg rounded-xl p-6 sm:p-8 md:p-10 shadow-lg">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight mb-4 text-white">
          Selamat Datang di <span class="text-green-300">SMA Al Hikmah</span>
        </h2>
        <p class="text-base sm:text-lg text-white mb-6">Sekolah Islam Modern yang Membentuk Generasi Cerdas, Islami, dan Mandiri</p>
        <a href="{{ route('tentang') }}" class="bg-green-400 hover:bg-green-300 text-black px-6 py-3 rounded-full font-semibold transition">Pelajari Lebih Lanjut</a>
      </div>
    </div>
  </div>
</section>

<section id="profil" class="py-16 bg-gray-100">
  @if ($sambutan)
  <div class="container mx-auto px-4">

    <h2 class="text-3xl font-bold text-center mb-8">Sambutan</h2>
    <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-8">
      <!-- Gambar Kepala Sekolah -->
      <div class="w-full md:w-1/3 mb-6 md:mb-0 flex flex-col items-center">
        <div class="w-32 h-32 md:w-40 md:h-40 overflow-hidden rounded-full shadow-lg">
          <img src="{{ asset('storage/' . $sambutan->image) }}" alt="Kepala Sekolah" class="w-full h-full object-cover">
        </div>
        <p class="text-center font-semibold mt-4">Saiin, S.Pd. (Kepala Sekolah)</p>
      </div>
      <!-- Sambutan -->
      <div class="w-full md:w-2/3">
        <p class="text-lg leading-relaxed text-justify pr-4">
          {{ $sambutan->isi }}
        </p>
      </div>
    </div>

  </div>
  @endif
</section>

<!-- Ekstrakurikuler -->
<section id="ekstrakurikuler" class="py-20 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Ekstrakurikuler</h3>
    <div class="grid md:grid-cols-3 gap-8">
      @foreach ($ekstra as $item )


      <x-ekstrakurikuler-card
        image="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default-ekstra.jpg') }}"
        title="{{ $item->nama }}"
        desc="{{ $item->deskripsi }}" />
      @endforeach
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
        <img src="/img/Juara.jpg" alt="Berita 1" class="mb-4 rounded-lg w-full object-cover h-40">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Juara Lomba</h3>
        <p class="text-sm text-gray-600">Siswa kelas 12 Juara.</p>
      </div>

      <!-- Berita 2 -->
      <div class="bg-white rounded-xl shadow p-6">
        <img src="/img/Juara.jpg" alt="Berita 2" class="mb-4 rounded-lg w-full object-cover h-40">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Juara 1 Lomba Tahfidz</h3>
        <p class="text-sm text-gray-600">Santri SMA Al Hikmah berhasil meraih juara dalam lomba tahfidz tingkat kabupaten.</p>
      </div>

      <!-- Berita 3 -->
      <div class="bg-white rounded-xl shadow p-6">
        <img src="/img/Juara.jpg" alt="Berita 3" class="mb-4 rounded-lg w-full object-cover h-40">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Juara Lomba</h3>
        <p class="text-sm text-gray-600">Kelas 11 berhasil mendapatkan juara 2.</p>
      </div>
    </div>

    <!-- Tombol Lihat Semua Berita -->
    <div class="text-center mt-8">
      <a href="{{ route('berita') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">
        Lihat Semua Berita
      </a>
    </div>
  </div>
</section>

@endsection