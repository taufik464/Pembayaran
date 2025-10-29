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
<section id="ekstrakurikuler" class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Ekstrakurikuler</h3>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($ekstra as $item)
            <x-ekstrakurikuler-card
                image="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/default-ekstra.jpg') }}"
                title="{{ $item->nama }}" desc="{{ $item->deskripsi }}" />
            @endforeach
        </div>
    </div>
</section>

<!-- Berita Terkini -->
<section class="py-16 bg-gray-100" id="berita">
    <div class="max-w-7xl mx-auto px-6  ">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Berita Terkini</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow p-6">
                <img src="/img/Juara.jpg" alt="Berita 1" class="mb-4 rounded-lg w-full object-cover h-40">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Juara Lomba</h3>
                <p class="text-sm text-gray-600">Siswa kelas 12 Juara.</p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <img src="/img/Juara.jpg" alt="Berita 2" class="mb-4 rounded-lg w-full object-cover h-40">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Juara 1 Lomba Tahfidz</h3>
                <p class="text-sm text-gray-600">Santri SMA Al Hikmah berhasil meraih juara dalam lomba tahfidz tingkat kabupaten.</p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <img src="/img/Juara.jpg" alt="Berita 3" class="mb-4 rounded-lg w-full object-cover h-40">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Juara Lomba</h3>
                <p class="text-sm text-gray-600">Kelas 11 berhasil mendapatkan juara 2.</p>
            </div>
        </div>

        <!-- Tombol Lihat Semua Berita -->
        <div class="text-center mt-8">
            <a href="{{ route('berita') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">
                Lihat Semua Berita
            </a>
        </div>
    </div>

</section>
<section class=" py-16 bg-gray-300">

    <div class=" m-4 bg-white" id="accordion-collapse" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                <span>What is Flowbite?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-2">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                <span>Is there a Figma file available?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-3">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                <span>What are the differences between Flowbite and Tailwind UI?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                    <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                    <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                </ul>
            </div>
        </div>
    </div>

</section>
@endsection