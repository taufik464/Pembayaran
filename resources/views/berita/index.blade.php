@extends('layouts.web')

@section('title', 'Berita')

@section('content')
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
@endsection
