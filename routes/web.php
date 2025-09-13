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
use App\Http\Controllers\KontenController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\admin\ekstrakurikuler\ekstraController;
use App\Http\Controllers\Admin\ProfilSekolah\ProfilSekolahController;
use App\Http\Controllers\admin\News\NewsController;

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

require __DIR__ . '/auth.php';

route::get('tentang', function () {
    return view('tentang');
});

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

// ==================== DASHBOARD ADMIN ====================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\dashboard::class, 'index'])->name('dashboard');

    Route::get('/admin/ekstrakurikuler', [ekstraController::class, 'index'])->name('admin.ekstrakurikuler');
    Route::get('/admin/ekstrakurikuler/create', [ekstraController::class, 'create'])->name('admin.ekstrakurikuler.create');
    Route::post('/admin/ekstrakurikuler', [ekstraController::class, 'store'])->name('admin.ekstrakurikuler.store');
    Route::get('/admin/ekstrakurikuler/{ekstrakurikuler}/edit', [ekstraController::class, 'edit'])->name('admin.ekstrakurikuler.edit');
    Route::put('/admin/ekstrakurikuler/{ekstrakurikuler}', [ekstraController::class, 'update'])->name('admin.ekstrakurikuler.update');
    Route::delete('/admin/ekstrakurikuler/{ekstrakurikuler}', [ekstraController::class, 'destroy'])->name('admin.ekstrakurikuler.destroy');
        // ROUTE ADMIN GALERI
        Route::get('/admin/galeri', [\App\Http\Controllers\admin\galeri\GaleriController::class, 'index'])->name('admin.galeri');
        Route::get('/admin/galeri/create', [\App\Http\Controllers\admin\galeri\GaleriController::class, 'create'])->name('admin.galeri.create');
        Route::post('/admin/galeri', [\App\Http\Controllers\admin\galeri\GaleriController::class, 'store'])->name('admin.galeri.store');
        Route::get('/admin/galeri/{gallery}/edit', [\App\Http\Controllers\admin\galeri\GaleriController::class, 'edit'])->name('admin.galeri.edit');
        Route::put('/admin/galeri/{gallery}', [\App\Http\Controllers\admin\galeri\GaleriController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/admin/galeri/{gallery}', [\App\Http\Controllers\admin\galeri\GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
    //
});

Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('profil.index');
Route::get('/admin/profilsekolah/create', [ProfilSekolahController::class, 'create'])->name('profil.create');
Route::post('/', [ProfilSekolahController::class, 'store'])->name('store');
Route::resource('profil', ProfilSekolahController::class);

 Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

