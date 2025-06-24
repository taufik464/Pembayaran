<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileSekolahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ==================== ROUTE BERANDA ====================
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [BerandaController::class, 'tentang'])->name('tentang');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

// ==================== PROFILE SEKOLAH ====================
Route::prefix('profile-sekolah')->group(function () {
    Route::get('/sambutan', [ProfileSekolahController::class, 'sambutan'])->name('sambutan');
    Route::get('/visi-misi', [ProfileSekolahController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/sejarah', [ProfileSekolahController::class, 'sejarah'])->name('sejarah');
});

// ==================== INFORMASI ====================
Route::prefix('informasi')->group(function () {
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/ppdb', [PPDBController::class, 'index'])->name('ppdb');
    Route::get('/ppdb/form', [PPDBController::class, 'create'])->name('ppdb.create');
    Route::post('/ppdb', [PPDBController::class, 'store'])->name('ppdb.store');
});

// ==================== LAYANAN ====================
Route::prefix('layanan')->group(function () {
    Route::get('/kontak', [LayananController::class, 'kontak'])->name('kontak');
    Route::get('/prestasi-sekolah', [PrestasiController::class, 'prestasiSekolah'])->name('prestasi-sekolah');
    Route::get('/prestasi-siswa', [PrestasiController::class, 'prestasiSiswa'])->name('prestasi-siswa');
});
