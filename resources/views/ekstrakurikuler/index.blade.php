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
      @foreach ($ekstra as $item )


      <x-ekstrakurikuler-card
        image="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/default-ekstra.jpg') }}"
        title="{{ $item->nama }}"
        desc="{{ $item->deskripsi }}" />
      @endforeach
    </div>
  </div>
</section>
@endsection