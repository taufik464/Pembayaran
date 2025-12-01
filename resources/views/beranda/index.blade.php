@extends('layouts.web')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-green-900 to-green-400 text-white min-h-[70vh] w-full overflow-hidden">
    <!-- Wave Pattern SVG di background -->
    <div class="absolute inset-0">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <defs>
                <linearGradient id="waveGradient" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0%" stop-color="#166534" stop-opacity="0.8" />
                    <stop offset="100%" stop-color="#22c55e" stop-opacity="0.8" />
                </linearGradient>
            </defs>
            <path fill="url(#waveGradient)"
                d="M0,64L80,80C160,96,320,128,480,128C640,128,800,96,960,106.7C1120,117,1280,171,1360,197.3L1440,224V0H0Z" />
        </svg>
    </div>

    <!-- Konten Utama -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-10 items-center">
        <!-- Kolom Kiri: Logo + Teks -->
        <div class="flex flex-col items-start space-y-4">
            <div class="flex items-center space-x-6">
                <img src="/img/logoalhikmah2.jpg" alt="Logo SMA" class="w-28 h-28 md:w-32 md:h-32 rounded-full shadow-lg">
                <div>
                    <h3 class="text-4xl md:text-5xl font-extrabold drop-shadow-lg">
                        Selamat Datang
                    </h3>
                    <p class="text-lg md:text-xl font-semibold drop-shadow-md">
                        Di SMA Al Hikmah Muncar
                    </p>
                </div>
            </div>

            <h2 class="text-2xl md:text-3xl font-bold leading-snug mt-6">
                Generasi yang berkualitas <br>
                <span class="text-sky-300">Unggul dibidang Alquran</span> <br>
                & <span class="text-sky-300">Ilmu Pengetahuan dan Teknologi</span>
            </h2>
        </div>

        <!-- Kolom Kanan: Gambar -->
        <div class="flex justify-center relative overflow-hidden">
            <img src="/img/OIP.png" alt="Santri Berjajar" class="rounded-lg  w-full md:w-4/5 relative z-10 transform translate-x-full transition-transform duration-1000 ease-out"
                onload="this.classList.remove('translate-x-full')">
            <!-- Efek dekorasi lingkaran blur -->
        </div>
    </div>
</section>

<!-- Video Section -->
<section class="border-t border-gray-300 my-6">
    <div class="w-full max-w-4xl mx-auto rounded-lg overflow-hidden shadow-lg">
        <div class="aspect-video">
            <iframe
                id="yt-video"
                src="https://www.youtube.com/embed/cZwITusqJXQ?enablejsapi=1&mute=1"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
                class="w-full h-full">
            </iframe>
        </div>
    </div>
</section>

<script>
    function onYouTubeIframeAPIReady() {
        const player = new YT.Player('yt-video');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    player.playVideo();
                } else {
                    player.pauseVideo();
                }
            });
        }, {
            threshold: 0.5
        });

        observer.observe(document.getElementById('yt-video'));
    }

    const tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    document.head.appendChild(tag);
</script>

<!-- Sambutan Section -->
<section id="profil" class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Sambutan</h2>
        <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-8">
            <!-- Gambar Kepala Sekolah -->
            <div class="w-full md:w-1/3 mb-6 md:mb-0 flex flex-col items-center">
                <div class="w-32 h-32 md:w-40 md:h-40 overflow-hidden rounded-full shadow-lg">
                    <img src="/img/KEPSEK.jpg" alt="Kepala Sekolah" class="w-full h-full object-cover">
                </div>
                <p class="text-center font-semibold mt-4">Saiin, S.Pd. (Kepala Sekolah)</p>
            </div>
            <!-- Sambutan -->
            <div class="w-full md:w-2/3">
                <p class="text-lg leading-relaxed text-justify">
                    Assalamu'alaikum warahmatullahi wabarakatuh. Puji syukur kehadirat Allah SWT atas rahmat dan
                    karunia-Nya, kami bisa terus memberikan pendidikan terbaik bagi generasi muda Islam. Di SMA Al
                    Hikmah, kami tidak hanya fokus pada akademik, tetapi juga pembentukan karakter Islami yang kuat,
                    sehingga siswa siap menghadapi tantangan masa depan dengan iman dan ilmu.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Ekstrakurikuler -->
<section id="ekstrakurikuler" class="bg-gradient-to-r from-green-500 to-emerald-700 text-white py-6 px-4 md:px-12 text-center relative overflow-hidden">
    <div class="max-w-6xl mx-auto px-6">
        <h3 class="text-3xl font-extrabold text-center mb-12 text-white">Ekstrakurikuler</h3>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($ekstra as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden"
                x-data="{ 
        current: 0, 
        images: {{ json_encode($item->galleryInformasis->pluck('image_path')) }} 
     }"
                x-init="if (images.length > 0) setInterval(() => { current = (current + 1) % images.length }, 5000)">

                {{-- Wrapper Gambar --}}
                <div class="relative w-full h-48 overflow-hidden">
                    <template x-for="(image, index) in images" :key="index">
                        <img
                            :src="'{{ asset('storage') }}/' + image"
                            alt="{{ $item->title }}"
                            class="absolute w-full h-48 object-cover transition-all duration-700 ease-in-out"
                            :class="{
                    'translate-x-0 opacity-100': current === index,
                    '-translate-x-full opacity-0': current > index,
                    'translate-x-full opacity-0': current < index
                }">
                    </template>

                    {{-- Jika tidak ada gambar di galeri --}}
                    <template x-if="images.length === 0">
                        <img src="{{ asset('images/default-informasi.jpg') }}"
                            alt="{{ $item->title }}"
                            class="w-full h-48 object-cover">
                    </template>
                </div>

                {{-- Konten Informasi --}}
                <div class="p-4 text-justify">
                    <h3 class="text-xl text-black font-semibold mb-2">{{ $item->title }}</h3>
                    <div class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {!! \Illuminate\Support\Str::limit($item->content, 150, '...') !!}
                    </div>
                    <a href="{{ route('informasi.show', $item->id) }}"
                        class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/dark-mosaic.png')] opacity-10 pointer-events-none"></div>

</section>

<!-- Berita Terkini -->
<section class="py-16 bg-gray-100" id="berita">
    <div class="max-w-7xl mx-auto px-6  ">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Berita Terkini</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($berita as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden"
                x-data="{ 
        current: 0, 
        images: {{ json_encode($item->galleryInformasis->pluck('image_path')) }} 
     }"
                x-init="if (images.length > 0) setInterval(() => { current = (current + 1) % images.length }, 5000)">

                {{-- Wrapper Gambar --}}
                <div class="relative w-full h-48 overflow-hidden">
                    <template x-for="(image, index) in images" :key="index">
                        <img
                            :src="'{{ asset('storage') }}/' + image"
                            alt="{{ $item->title }}"
                            class="absolute w-full h-48 object-cover transition-all duration-700 ease-in-out"
                            :class="{
                    'translate-x-0 opacity-100': current === index,
                    '-translate-x-full opacity-0': current > index,
                    'translate-x-full opacity-0': current < index
                }">
                    </template>

                    {{-- Jika tidak ada gambar di galeri --}}
                    <template x-if="images.length === 0">
                        <img src="{{ asset('images/default-informasi.jpg') }}"
                            alt="{{ $item->title }}"
                            class="w-full h-48 object-cover">
                    </template>
                </div>

                {{-- Konten Informasi --}}
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                    <div class="text-gray-600 text-sm mb-4 line-clamp-4">
                        {!! \Illuminate\Support\Str::limit($item->content, 150, '...') !!}
                    </div>
                    <a href="{{ route('informasi.show', $item->id) }}"
                        class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Tombol Lihat Semua Berita -->
        <div class="text-center mt-8">
            <a href="{{ route('informasi.kategori', 'Berita') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">
                Lihat Semua Berita
            </a>
        </div>
    </div>

</section>

<section id="alumni" class="bg-green-500 w-full">

    <div class="w-full  grid md:grid-cols-3  items-center">
        <!-- Gambar Utama Alumni -->
        <div class="col-span-1 bg-white">
            <img src="img/gambar_alumni.png" alt="Gambar Alumni" class="w-full rounded-lg shadow-lg">
        </div>

        <!-- Paragraf Penjelasan Utama -->
        <div class=" ml-3 px-6 col-span-2 items-start"> <!-- Tambah items-start untuk rata atas vertikal -->
            <h2 class="text-3xl text-center font-bold mb-8">Alumni Kami</h2> <!-- Ganti text-center ke text-left jika ingin rata kiri -->
            <p class="text-justify leading-relaxed my-1"> <!-- Ganti flex justify-between ke text-justify untuk rata kiri-kanan -->
                SMA Al Hikmah Muncar bangga memiliki jaringan alumni yang kuat dan berprestasi di berbagai bidang. Kami tidak hanya sukses dalam karir profesional, tetapi juga aktif berkontribusi dalam
                masyarakat dan menjaga nilai-nilai Islami yang diajarkan selama di sekolah. Kami terus mendukung
                perkembangan alumni melalui berbagai program dan kegiatan, serta menjalin hubungan erat untuk
                menciptakan komunitas yang saling mendukung.
            </p>

            <!-- Alumni Cards: Gambar dan Penjelasan Sejajar -->
            <div class="grid md:grid-cols-2 mt-2 gap-8 items-start"> <!-- Tambah items-start untuk rata atas di grid -->

                <!-- Card Alumni 1 -->
                @foreach ($alumni as $a)
                <div class="bg-white p-4 rounded-lg grid grid-cols-3 gap-4 items-start border border-gray-100">

                    <div class="col-span-1">

                        @if ($a->foto)
                        {{-- KONDISI 1: FOTO ADA --}}
                        <img src="{{ asset('storage/' . $a->foto) }}"
                            alt="Foto {{ $a->nama }}"
                            class="w-16 h-16 rounded-full object-cover shadow-sm">
                        @else
                        {{-- KONDISI 2: FOTO TIDAK ADA, TAMPILKAN ICON SVG sebagai placeholder --}}
                        <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center shadow-sm">
                            {{-- Ikon SVG (ukuran diperbesar agar terlihat jelas, w-8) --}}
                            <svg class="w-8 h-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        @endif
                    </div>

                    <div class="col-span-2">
                        <div class="text-sm font-semibold text-gray-800">{{ $a->nama }}</div>
                        <p class="text-xs text-gray-600 mt-0.5">
                            Angkatan {{ $a->tahun_lulus }}
                            @if ($a->pekerjaan)
                            , {{ $a->pekerjaan }} di {{ $a->tempat_kerja }}
                            @endif
                        </p>
                    </div>
                </div>
                @endforeach



            </div>
            <a href="{{ route('informasi.alumni') }}"
                class="inline-block mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">
                Lihat Semua Alumni
            </a>
        </div>

    </div>
</section>
<!-- FAQ Section -->
<section class="py-16 bg-gray-300">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">FAQ</h2>

    <div id="accordion-collapse" data-accordion="collapse" class=" mx-6">
        @foreach ($faqs as $faq)
        @php $index = $loop->index + 1; @endphp
        <div class="mb-2 border border-gray-200 rounded-lg bg-white">
            <h2 id="accordion-heading-{{ $index }}">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-gray-800 border-b border-gray-200 rounded-t-lg focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 gap-3"
                    data-accordion-target="#accordion-body-{{ $index }}"
                    aria-expanded="false"
                    aria-controls="accordion-body-{{ $index }}">
                    <span>{{ $faq->question }}</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-body-{{ $index }}" class="hidden"
                aria-labelledby="accordion-heading-{{ $index }}">
                <div class="p-5 text-gray-600">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        <div class="text-center mt-8">
            <a href="{{ route('faqs') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">
                Lihat Semua FAQ
            </a>
        </div>
    </div>
</section>
@endsection