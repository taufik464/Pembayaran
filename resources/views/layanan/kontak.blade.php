@extends('layouts.web')

@section('title', 'Kontak Kami')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Kontak</h2>
        <div class="grid md:grid-cols-2 gap-8 items-stretch">
            <!-- Google Maps -->
            <div class="rounded-xl overflow-hidden shadow h-full">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.1223429527163!2d114.3317085120609!3d-8.487483810227467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd3fcc2c347a3fb%3A0x7c06614757914f55!2sSMA%20AL%20HIKMAH%20MUNCAR!5e0!3m2!1sid!2sid!4v1758458822713!5m2!1sid!2sid"
                    width="100%"
                    height="100%"
                    class="min-h-[450px] h-full w-full"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Informasi Kontak -->
            <div class="bg-white p-8 rounded-xl shadow h-full flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-semibold mb-6">Informasi Kontak</h3>

                    <!-- Alamat -->
                    <div class="mb-6">
                        <h4 class="font-medium flex items-center mb-2">
                            <i class="fas fa-home text-green-600 mr-2"></i> Alamat
                        </h4>
                        <p class="text-gray-600">
                            Jl. KH Abdul Mannan No.RT. 006/12, Dusun Sidomulyo,
                            Sumberberas, Kec. Muncar, Kabupaten Banyuwangi, Jawa Timur 68472
                        </p>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="mb-6">
                        <h4 class="font-medium flex items-center mb-2">
                            <i class="fas fa-clock text-green-600 mr-2"></i> Jam Operasional
                        </h4>
                        <table class="text-gray-600">
                            <tr>
                                <td class="pr-4">Senin</td>
                                <td>06.30 – 13.30</td>
                            </tr>
                            <tr>
                                <td class="pr-4">Selasa</td>
                                <td>06.30 – 13.00</td>
                            </tr>
                            <tr>
                                <td class="pr-4">Rabu</td>
                                <td>06.30 – 13.00</td>
                            </tr>
                            <tr>
                                <td class="pr-4">Kamis</td>
                                <td>06.30 – 13.00</td>
                            </tr>
                            <tr>
                                <td class="pr-4">Jumat</td>
                                <td>06.30 – 13.00</td>
                            </tr>
                            <tr>
                                <td class="pr-4">Sabtu</td>
                                <td>06.30 – 13.30</td>
                            </tr>
                            <tr>
                                <td class="pr-4">Minggu</td>
                                <td>Tutup</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Sosial Media -->
                <h3 class="text-lg font-semibold mt-6">Sosial Media</h3>
                <div class="text-gray-600 space-y-2">
                    <p class="flex items-center">
                        <i class="fas fa-phone text-green-600 mr-2"></i>
                        Telp: (0333) 592845
                    </p>
                    <p class="flex items-center">
                        <i class="fas fa-envelope text-green-600 mr-2"></i>
                        Email: smaalhikmahmuncar@yahoo.co.id
                    </p>
                    <p class="flex items-center">
                        <i class="fas fa-phone-alt text-green-600 mr-2"></i>
                        Hubungi: 0333-592845
                    </p>
                </div>

                <div class="flex space-x-4 mt-6">
                    <a href="https://www.facebook.com/smaalhikmahmuncar" target="_blank" class="bg-green-600 hover:bg-green-700 text-white w-10 h-10 flex items-center justify-center rounded-full transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/smaalhikmahmuncar?igsh=dDA3b2hneGtudXB5" target="_blank" class="bg-green-600 hover:bg-green-700 text-white w-10 h-10 flex items-center justify-center rounded-full transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@bilhikmah" target="_blank" class="bg-green-600 hover:bg-green-700 text-white w-10 h-10 flex items-center justify-center rounded-full transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://www.yahoo.com" target="_blank" class="bg-green-600 hover:bg-green-700 text-white w-10 h-10 flex items-center justify-center rounded-full transition">
                        <i class="fab fa-yahoo"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
