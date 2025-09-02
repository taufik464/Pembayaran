@extends('layouts.web')

@section('title', 'Visi dan Misi')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Visi dan Misi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-4 text-green-600">Visi</h3>
                <p class="text-lg leading-relaxed">
                    Terwujudnya Peserta Didik yang Beriman dan Bertaqwa, Berprestasi  Berdaya saing, Mandiri dan Berwawasan Global                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-4 text-green-600">Misi</h3>
                <ul class="list-disc pl-5 space-y-2 text-lg leading-relaxed">
                    <li>Melaksanakan kegiatan yang dapat meningkatkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa.</li>
                    <li>Menanamkan kedisiplinan pada semua aspek kepada seluruh warga sekolah</li>
                    <li>Menumbuhkembangkan semangat untuk selalu berprestasi dibidang akademik maupun non akademik</li>
                    <li>Menumbuhkan semangat inovasi yang dapat menunjang pengembangan profesionalisme</li>
                    <li>Memberdayakan seluruh komponen sekolah dan mengoptimalkan sumber daya sekolah dalam mengembangkan potensi dan minat peserta didik secara optimal.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
