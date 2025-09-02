@extends('layouts.web')

@section('title', 'Sambutan Kepala Sekolah')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Sambutan Kepala Sekolah</h2>
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="w-full md:w-1/3 flex justify-center">
                <div class="w-48 h-48 rounded-full overflow-hidden shadow-lg">
                    <img src="{{ asset('/img/KEPSEK.jpg') }}" alt="Kepala Sekolah" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="w-full md:w-2/3">
                <p class="text-lg leading-relaxed mb-4">
                    "Assalamu'alaikum warahmatullahi wabarakatuh. Puji syukur kehadirat Allah SWT atas rahmat dan karunia-Nya, kami bisa terus memberikan pendidikan terbaik bagi generasi muda Islam."
                </p>
                <p class="text-lg leading-relaxed">
                    "Di SMA Al Hikmah, kami tidak hanya fokus pada akademik, tetapi juga pembentukan karakter Islami yang kuat, sehingga siswa siap menghadapi tantangan masa depan dengan iman dan ilmu."
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
