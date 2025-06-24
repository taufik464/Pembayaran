@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Kontak Kami</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-4">Informasi Kontak</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-green-600 mt-1 mr-3"></i>
                        <div>
                            <h4 class="font-medium">Alamat</h4>
                            <p class="text-gray-600">Muncar Banyuwangi Jawa Timur</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-phone-alt text-green-600 mt-1 mr-3"></i>
                        <div>
                            <h4 class="font-medium">Telepon</h4>
                            <p class="text-gray-600">(022) 1234567</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-envelope text-green-600 mt-1 mr-3"></i>
                        <div>
                            <h4 class="font-medium">Email</h4>
                            <p class="text-gray-600">info@smaalhikmah.sch.id</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-clock text-green-600 mt-1 mr-3"></i>
                        <div>
                            <h4 class="font-medium">Jam Operasional</h4>
                            <p class="text-gray-600">Senin-Sabtu: 07.00 - 16.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-4">Kirim Pesan</h3>
                <form class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                        <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"></textarea>
                    </div>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition w-full">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
