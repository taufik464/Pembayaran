@extends('layouts.web')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-green-900 to-green-400 text-white min-h-[60vh] lg:min-h-[70vh] w-full overflow-hidden">

    <!-- Background Wave -->
    <div class="absolute inset-0">
        <svg class="w-full h-full max-h-[220px] lg:max-h-none"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none">
            <defs>
                <linearGradient id="waveGradient" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0%" stop-color="#166534" stop-opacity="0.85" />
                    <stop offset="100%" stop-color="#22c55e" stop-opacity="0.85" />
                </linearGradient>
            </defs>
            <path fill="url(#waveGradient)"
                d="M0,64L80,80C160,96,320,128,480,128C640,128,800,96,960,106.7C1120,117,1280,171,1360,197.3L1440,224V0H0Z" />
        </svg>
    </div>

    <!-- Konten -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24
                grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Kiri -->
        <div class="space-y-6 text-center lg:text-left">

            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-6">
                <img src="/img/logoalhikmah2.jpg"
                    class="w-20 h-20 sm:w-28 sm:h-28 lg:w-36 lg:h-36
                           rounded-full shadow-xl bg-white"
                    alt="Logo SMA">

                <div>
                    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold drop-shadow-lg">
                        Selamat Datang
                    </h3>
                    <p class="text-base sm:text-lg lg:text-xl font-semibold opacity-90">
                        Di SMA Al Hikmah Muncar
                    </p>
                </div>
            </div>

            <h2 class="text-lg sm:text-xl lg:text-3xl font-bold leading-relaxed">
                Generasi yang berkualitas <br>
                <span class="text-sky-300">Unggul di bidang Al-Qur'an</span><br>
                & <span class="text-sky-300">Ilmu Pengetahuan dan Teknologi</span>
            </h2>

        </div>

        <!-- Kanan -->
        <div class="flex justify-center">
            <img src="/img/OIP.png"
                alt="Santri"
                class="w-full max-w-xs sm:max-w-sm lg:max-w-md
                       rounded-2xl shadow-2xl
                       opacity-0 translate-y-6
                       transition-all duration-1000 ease-out"
                onload="this.classList.remove('opacity-0','translate-y-6')">
        </div>

    </div>
</section>



<!-- Video Section -->
<section class="border-t border-gray-300 my-6">
    <div class="w-full max-w-4xl mx-auto rounded-lg overflow-hidden shadow-lg">
        <div class="aspect-video">
            <iframe
                id="yt-video"
                src="https://www.youtube.com/embed/KROLa7Ols50?si=SzRphSAFSqqTx4JS"
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
        <h2 class="text-3xl font-bold text-center mb-8">{{ $tentangkami->judul ?? 'Tentang Kami' }}</h2>
        <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-8">
            <!-- Gambar -->
            <div class="w-full md:w-1/3 mb-6 md:mb-0 flex flex-col items-center">
                @if($tentangkami && $tentangkami->image)
                <div class="w-32 h-32 md:w-40 md:h-40 overflow-hidden  shadow-lg">
                    <img src="{{ asset('storage/' . $tentangkami->image) }}" alt="{{ $tentangkami->judul }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-32 h-32 md:w-40 md:h-40 overflow-hidden rounded-full shadow-lg bg-gray-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                @endif
                <p class="text-center font-semibold mt-4">{{ $tentangkami->judul ?? 'SMA Al Hikmah' }}</p>
            </div>
            <!-- Konten -->
            <div class="w-full md:w-2/3">
                <div class="text-lg leading-relaxed text-justify">
                    {!! $tentangkami->isi ?? 'Konten tentang sekolah belum tersedia.' !!}
                </div>
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

    <div class="container mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
        <!-- Gambar Utama Alumni -->
        <div class="w-full">
            <img src="img/gambar_alumni.png" alt="Gambar Alumni"
                class="w-full h-auto rounded-lg shadow-lg object-cover">
        </div>

        <!-- Paragraf Penjelasan Utama -->
        <div class="md:col-span-2">
            <h2 class="text-3xl font-bold mb-6 text-left md:text-left text-center">Alumni Kami</h2>
            <p class="text-justify leading-relaxed mb-6">
                SMA Al Hikmah Muncar bangga memiliki jaringan alumni yang kuat dan berprestasi di berbagai bidang. Kami tidak hanya sukses dalam karir profesional, tetapi juga aktif berkontribusi dalam
                masyarakat dan menjaga nilai-nilai Islami yang diajarkan selama di sekolah. Kami terus mendukung
                perkembangan alumni melalui berbagai program dan kegiatan, serta menjalin hubungan erat untuk
                menciptakan komunitas yang saling mendukung.
            </p>

            <!-- Alumni Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($alumni as $a)
                <a href="{{ route('informasi.alumni.show', $a->id) }}" class="block hover:scale-[1.01] transition duration-200">
                    <div class="bg-white p-4 rounded-lg grid grid-cols-3 gap-4 items-start border border-gray-100 hover:shadow-md">

                        <div class="col-span-1">
                            @if ($a->foto)
                            <img src="{{ asset('storage/' . $a->foto) }}"
                                alt="Foto {{ $a->nama }}"
                                class="w-16 h-16 rounded-full object-cover shadow-sm">
                            @else
                            <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center shadow-sm">
                                <svg class="w-8 h-8 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                        clip-rule="evenodd" />
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
                </a>
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