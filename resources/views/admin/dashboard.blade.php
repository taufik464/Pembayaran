@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')



<!-- Main Content -->
<div class="flex-1 p-2">
    <!-- Header -->
    <div class="bg-white p-5 rounded-lg shadow mb-5">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-green-800">Selamat Datang, Admin!</h1>
                <p class="text-gray-600">Kelola website Sekolah Unggulan dengan mudah</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700" role="menuitem"> <i class="fas fa-sign-out-alt"></i> Keluar</a>
            </form>
        </div>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
        <div class="bg-white p-5 rounded-lg shadow">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-newspaper text-green-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-2xl font-bold">24</h3>
                    <p class="text-gray-600">Total Artikel</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-images text-green-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-2xl font-bold">{{ $jumgaleri }}</h3>
                    <p class="text-gray-600">Foto Galeri</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-eye text-green-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-2xl font-bold">{{ $totalVisitors }}</h3>
                    <p class="text-gray-600">Pengunjung Bulanan</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-envelope text-green-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-2xl font-bold">45</h3>
                    <p class="text-gray-600">Pesan Baru</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white p-5 rounded-lg shadow mb-5">
        <h2 class="text-xl font-bold text-green-800 mb-3">Aksi Cepat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.informasi.create') }}" class="bg-green-600 text-white p-4 rounded-lg text-center hover:bg-green-700">
                <i class="fas fa-plus"></i>
                <span class="block mt-2">Tambah Artikel</span>
            </a>
            <a href="admin-gallery.html" class="bg-green-600 text-white p-4 rounded-lg text-center hover:bg-green-700">
                <i class="fas fa-upload"></i>
                <span class="block mt-2">Upload Foto</span>
            </a>
            <a href="#" class="bg-green-600 text-white p-4 rounded-lg text-center hover:bg-green-700">
                <i class="fas fa-user-plus"></i>
                <span class="block mt-2">Tambah User</span>
            </a>
            <a href="#" class="bg-green-600 text-white p-4 rounded-lg text-center hover:bg-green-700">
                <i class="fas fa-cog"></i>
                <span class="block mt-2">Pengaturan</span>
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white p-5 rounded-lg shadow">
        <h2 class="text-xl font-bold text-green-800 mb-3">Aktivitas Terbaru</h2>
        <ul class="list-disc list-inside">
            <li class="py-2 border-b border-gray-200">
                <i class="fas fa-plus text-green-600"></i> Artikel baru ditambahkan - 2 menit yang lalu
            </li>
            <li class="py-2 border-b border-gray-200">
                <i class="fas fa-edit text-blue-600"></i> Artikel diperbarui - 1 jam yang lalu
            </li>
            <li class="py-2 border-b border-gray-200">
                <i class="fas fa-image text-orange-600"></i> Foto baru diupload - 3 jam yang lalu
            </li>
            <li class="py-2 border-b border-gray-200">
                <i class="fas fa-user text-purple-600"></i> User login - 5 jam yang lalu
            </li>
        </ul>
    </div>
</div>


<script>
    // Simple logout confirmation
    document.querySelector('.logout-btn').addEventListener('click', function(e) {
        if (!confirm('Apakah Anda yakin ingin keluar?')) {
            e.preventDefault();
        }
    });
</script>
@endsection