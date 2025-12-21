<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ppdbController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\admin\kontak\kontakController;
use App\Http\Controllers\admin\identitas\IdentitasSekolahController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\admin\informasi\kategoriController;
use App\Http\Controllers\admin\informasi\informationController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ppdb\PpdbControlController;

use App\Http\Controllers\Admin\ProfilSekolah\ProfilSekolahController;

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
route::get('/faqs', [BerandaController::class, 'faqs'])->name('faqs');
// ==================== PROFILE SEKOLAH ====================
Route::prefix('profile-sekolah')->group(function () {
    Route::get('/sambutan', [ProfileSekolahController::class, 'sambutan'])->name('sambutan');
    Route::get('/visi-misi', [ProfileSekolahController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/sejarah', [ProfileSekolahController::class, 'sejarah'])->name('sejarah');
    Route::get('/profil-sekolah/{judul}', [ProfileSekolahController::class, 'showStriped'])->name('profil-sekolah.show.striped');
});

// ==================== INFORMASI ====================

Route::get('informasis/{slug}', [InformasiController::class, 'byKategori'])->name('informasis.kategori');
Route::get('informasi/gallery', [InformasiController::class, 'gallery'])->name('informasi.gallery');
Route::get('informasi/{id}', [InformasiController::class, 'show'])->name('informasi.show');
Route::get('informasi/', [InformasiController::class, 'alumni'])->name('informasi.alumni');
Route::get('informasi/alumni/{id}', [InformasiController::class, 'alumniShow'])->name('informasi.alumni.show');
Route::get('/informasi/{slug}', [InformasiController::class, 'byKategori'])->name('informasi.kategori');


// ==================== LAYANAN ====================
Route::prefix('layanan')->group(function () {
    Route::get('/kontak', [LayananController::class, 'kontak'])->name('kontak');
});

Route::get('/ppdb', [ppdbController::class, 'landingpage'])->name('ppdb');
Route::get('/ppdb/form', [ppdbController::class, 'index'])->name('ppdb.form');
Route::post('/ppdb', [ppdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/success', [ppdbController::class, 'success'])->name('ppdb.success');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\dashboard::class, 'index'])->name('dashboard');
});

// untuk menampilkan halaman admin bagi role superadmin 
Route::middleware(['isSuperadmin', 'verified'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
});


// ==================== DASHBOARD ADMIN ====================
Route::middleware(['isSuperadminOrStaff',  'verified'])->group(function () {
    // Route Admin User


    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    route::get('/admin/kontak', [kontakController::class, 'index'])->name('admin.kontak');
    route::get('/admin/kontak/create', [kontakController::class, 'create'])->name('admin.kontak.create');
    route::post('/admin/kontak', [kontakController::class, 'store'])->name('admin.kontak.store');
    route::get('/admin/kontak/{id}/edit', [kontakController::class, 'edit'])->name('admin.kontak.edit');
    route::put('/admin/kontak/{id}', [kontakController::class, 'update'])->name('admin.kontak.update');
    route::delete('/admin/kontak/{id}', [kontakController::class, 'destroy'])->name('admin.kontak.destroy');

    // Route Identitas Sekolah Tanpa Resource
    Route::get('/admin/identitas', [IdentitasSekolahController::class, 'index'])->name('admin.identitas.index');
    Route::get('/admin/identitas/create', [IdentitasSekolahController::class, 'create'])->name('admin.identitas.create');
    Route::post('/admin/identitas', [IdentitasSekolahController::class, 'store'])->name('admin.identitas.store');
    Route::get('/admin/identitas/{identitas}/edit', [IdentitasSekolahController::class, 'edit'])->name('admin.identitas.edit');
    Route::put('/admin/identitas/{identitas}', [IdentitasSekolahController::class, 'update'])->name('admin.identitas.update');
    Route::delete('/admin/identitas/{identitas}', [IdentitasSekolahController::class, 'destroy'])->name('admin.identitas.destroy');


    Route::get('/profil-Sekolah', [ProfilSekolahController::class, 'index'])->name('profil.index');
    Route::get('/admin/profilsekolah/create', [ProfilSekolahController::class, 'create'])->name('profil.create');
    Route::post('/', [ProfilSekolahController::class, 'store'])->name('store');
    Route::resource('profil', ProfilSekolahController::class);




    Route::get('/admin/kategori', [kategoriController::class, 'index'])->name('admin.kategori');
    Route::get('/admin/kategori/tambah', [kategoriController::class, 'tambah'])->name('admin.kategori.tambah');
    Route::get('/admin/kategori/{id}', [kategoriController::class, 'show'])->name('admin.kategori.show');
    Route::post('/admin/kategori', [kategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/admin/kategori/{id}/edit', [kategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/admin/kategori/{id}', [kategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/admin/kategori/{id}', [kategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    Route::get('/admin/informasi', [informationController::class, 'index'])->name('admin.informasi');
    Route::get('/admin/informasi/create', [informationController::class, 'create'])->name('admin.informasi.create');
    Route::post('/admin/informasi', [informationController::class, 'store'])->name('admin.informasi.store');
    Route::get('/admin/informasi/{id}/edit', [informationController::class, 'edit'])->name('admin.informasi.edit');
    Route::put('/admin/informasi/{id}', [informationController::class, 'update'])->name('admin.informasi.update');
    Route::delete('/admin/informasi/{id}', [informationController::class, 'destroy'])->name('admin.informasi.destroy');

    Route::get('/admin/alumni', [\App\Http\Controllers\admin\alumni\alumniController::class, 'index'])->name('admin.alumni');
    Route::get('/admin/alumni/create', [\App\Http\Controllers\admin\alumni\alumniController::class, 'create'])->name(name: 'admin.alumni.create');
    Route::post('/admin/alumni', [\App\Http\Controllers\admin\alumni\alumniController::class, 'store'])->name('admin.alumni.store');
    Route::get('/admin/alumni/{id}/edit', [\App\Http\Controllers\admin\alumni\alumniController::class, 'edit'])->name('admin.alumni.edit');
    Route::put('/admin/alumni/{id}', [\App\Http\Controllers\admin\alumni\alumniController::class, 'update'])->name('admin.alumni.update');
    Route::delete('/admin/alumni/{id}', [\App\Http\Controllers\admin\alumni\alumniController::class, 'destroy'])->name('admin.alumni.destroy');


    Route::get('/admin/faq', [\App\Http\Controllers\admin\faq\faqController::class, 'index'])->name('admin.faq');
    Route::get('/admin/faq/create', [\App\Http\Controllers\admin\faq\faqController::class, 'create'])->name('admin.faq.create');
    Route::post('/admin/faq', [\App\Http\Controllers\admin\faq\faqController::class, 'store'])->name('admin.faq.store');
    Route::get('/admin/faq/{id}/edit', [\App\Http\Controllers\admin\faq\faqController::class, 'edit'])->name('admin.faq.edit');
    Route::put('/admin/faq/{id}', [\App\Http\Controllers\admin\faq\faqController::class, 'update'])->name('admin.faq.update');
    Route::delete('/admin/faq/{id}', [\App\Http\Controllers\admin\faq\faqController::class, 'destroy'])->name('admin.faq.destroy');

    // Route Control PPDB
    Route::get('/admin/ppdb/dashboard', [PpdbControlController::class, 'index'])->name('admin.ppdb.dashboard');
    Route::post('/admin/control/update', [PpdbControlController::class, 'updateControl'])->name('admin.control.update');
    Route::get('/admin/ppdb/list', [PpdbControlController::class, 'list'])->name('admin.ppdb.list');
    Route::get('/admin/ppdb/export', [PpdbControlController::class, 'downloadZip'])->name('ppdb.export');
    
    Route::get('/admin/ppdb/applicant/{id}', [PpdbControlController::class, 'showApplicant'])->name('admin.ppdb.show');
});
