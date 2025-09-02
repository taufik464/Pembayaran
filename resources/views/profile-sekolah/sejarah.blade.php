@extends('layouts.web')

@section('title', 'Sejarah Sekolah')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Sejarah Sekolah</h2>
        <div class="bg-white p-8 rounded-xl shadow">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('/img/DepanSekolah.jpg') }}" alt="Halaman Depan" class="w-full rounded-lg shadow">
                    <p class="text-center text-sm text-gray-500 mt-2">Gedung SMA Al Hikmah tahun 1995</p>
                </div>
                <div class="w-full md:w-1/2">
                    <p class="text-lg leading-relaxed mb-4">
                        SMA Al Hikmah Muncar terletak di Kabupaten Banyuwangi. Sekolah ini berkomitmen memberikan pendidikan berkualitas. Fokus utama ditujukan untuk siswa-siswi yang berprestasi.                    </p>
                    <p class="text-lg leading-relaxed mb-4">
                        Sebagai lembaga pendidikan swasta, sekolah ini tumbuh pesat. Didirikan sejak tanggal 7 September 1987, SMA Al Hikmah telah melayani generasi demi generasi.                    </p>
                    <p class="text-lg leading-relaxed">
                        Kini, SMA Al Hikmah berkembang menjadi Sekolah Menengah Atas. Perjalanan panjangnya penuh dedikasi dan pengabdian. Menjadi pilihan unggulan masyarakat hingga saat ini.                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
