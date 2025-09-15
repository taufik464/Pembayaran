@extends('layouts.web')

@section('title', 'Sarana Dan Prasarana')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Sarana dan Prasarana</h2>
        <!-- DETAIL FASILITAS -->
        <div class="max-w-6xl mx-auto p-6">
            <div class="grid md:grid-cols-2 gap-6 items-start bg-white p-4 rounded-xl shadow-lg">

                <!-- FOTO -->
                <div class="flex justify-center">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiT00digIJcEXygntMoOaFtoUEw0VWloLAPN8eQRYfifsIBQnRAWXM-dYwcfNdLMTRUqX3DLb33Y5pS-BIdxdI6OUWiwHFxK6Om7qbvqMuVx5RN_cIWSkkJu1GIPCDb_YmZIp1f5igYntkoCZiTbotPsbuGW7bO1gS9K8GQeRWf0atqej-JO4KtmZ6THwVn/w640-h426/IAN_0081.JPG" alt="Laboratorium Biologi"
                        class="rounded-lg shadow-md">
                </div>

                <!-- DETAIL -->
                <div>
                    <table class="w-full border border-gray-200 rounded-lg mb-4">
                        <tr class="bg-gray-100">
                            <td class="px-3 py-2 font-semibold w-1/3">Nama Fasilitas</td>
                            <td class="px-3 py-2">Laboratorium Biologi</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-2 font-semibold">Kondisi</td>
                            <td class="px-3 py-2">Baik</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-2 font-semibold">Kategori</td>
                            <td class="px-3 py-2">Laboratorium</td>
                        </tr>
                    </table>

                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum natus quidem amet totam et, quos sequi! Aliquid dolorem velit modi veniam sint aspernatur temporibus culpa, unde ducimus labore ad perspiciatis, est quam ab eveniet corrupti, quae facilis error nesciunt ipsum.
                    </p>

                    <p class="text-sm text-gray-400">Tanggal: 23 Februari 2025 07:01</p>
                </div>
            </div>
        </div>

        <!-- LIHAT FASILITAS LAINNYA -->
        <div class="max-w-6xl mx-auto px-6 mt-10">
            <h2 class="text-xl font-bold text-center mb-6">Lihat Fasilitas Lainnya....</h2>

            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">

                <!-- CARD -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.zOdA5Z5N5HWTFcqw9vcDmgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Laboratorium Bahasa" class="rounded-t-xl">
                    <div class="p-4">
                        <h3 class="text-blue-600 font-bold">Laboratorium Bahasa</h3>
                        <p class="text-gray-500 text-sm">Laboratorium | Baik</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.zOdA5Z5N5HWTFcqw9vcDmgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Laboratorium Bahasa" class="rounded-t-xl">
                    <div class="p-4">
                        <h3 class="text-blue-600 font-bold">Laboratorium Bahasa</h3>
                        <p class="text-gray-500 text-sm">Laboratorium | Baik</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.zOdA5Z5N5HWTFcqw9vcDmgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Laboratorium Bahasa" class="rounded-t-xl">
                    <div class="p-4">
                        <h3 class="text-blue-600 font-bold">Laboratorium Bahasa</h3>
                        <p class="text-gray-500 text-sm">Laboratorium | Baik</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.zOdA5Z5N5HWTFcqw9vcDmgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Laboratorium Bahasa" class="rounded-t-xl">
                    <div class="p-4">
                        <h3 class="text-blue-600 font-bold">Laboratorium Bahasa</h3>
                        <p class="text-gray-500 text-sm">Laboratorium | Baik</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection