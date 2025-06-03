<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\naik_kelasController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\SettingBulananController;
use App\Http\Controllers\SettingTahunanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PLainController;
use App\Http\Controllers\settingPtambahanController;
use App\Models\transaksi;

//Rebuild Web
Route::get('/', [LandingController::class, 'index']); // Landing page utama
Route::get('/landing', [LandingController::class, 'index']); // Alternatif

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [dashboard::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//Siswa
    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

//Staff
    Route::get('staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('staff/store', [StaffController::class, 'store'])->name('staff.store');
    Route::get('staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
    Route::put('staff/update/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('staff/destroy/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');

//Kelas
    Route::get('kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::get('kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');



//Naik Kelas
    Route::get('/naik-kelas', [naik_KelasController::class, 'index'])->name('naik_kelas.index');
    Route::get('/naik-kelas/siswa/{id}', [naik_KelasController::class, 'getSiswaByKelas']);
    Route::post('/naik-kelas/simpan', [naik_KelasController::class, 'simpan'])->name('naik_kelas.simpan');

//Jenis Pembayaran
    Route::get('jenis-pembayaran', [JenisPembayaranController::class, 'index'])->name('jenis-pembayaran.index');
    Route::get('jenis-pembayaran/create', [JenisPembayaranController::class, 'create'])->name('jenis-pembayaran.create');
    Route::post('jenis-pembayaran/store', [JenisPembayaranController::class, 'store'])->name('jenis-pembayaran.store');
    Route::get('jenis-pembayaran/edit/{id}', [JenisPembayaranController::class, 'edit'])->name('jenis-pembayaran.edit');
    Route::put('jenis-pembayaran/update/{id}', [JenisPembayaranController::class, 'update'])->name('jenis-pembayaran.update');
    Route::delete('jenis-pembayaran/destroy/{id}', [JenisPembayaranController::class, 'destroy'])->name('jenis-pembayaran.destroy');
    Route::get('jenis-pembayaran/show/{id}', [JenisPembayaranController::class, 'show'])->name('jenis-pembayaran.show');

    Route::resource('P-tambahan', PLainController::class)->names('p-tambahan');



    Route::get('jenis-pembayaran/{id}/setting-tarif', [JenisPembayaranController::class, 'redirectSettingTarif'])->name('jenis-pembayaran.setting-tarif');

    //Route::get('/setting-bulanan/{id}', SettingBulananForm::class)->name('setting-bulanan.form');

    Route::get('setting-bulanan/{id}', [SettingBulananController::class, 'index'])->name('setting-bulanan.index');
    Route::post('setting-bulanan/store', [SettingBulananController::class, 'store'])->name('setting-bulanan.store');
    Route::get('setting-bulanan/edit/{id}', [SettingBulananController::class, 'edit'])->name('setting-bulanan.edit');
    Route::put('setting-bulanan/update/{id}', [SettingBulananController::class, 'update'])->name('setting-bulanan.update');
    Route::delete('setting-bulanan/destroy/{nis}/{id}', [SettingBulananController::class, 'destroy'])->name('setting-bulanan.destroy');
    Route::get('/setting-bulanan/show/{nis}', [SettingBulananController::class, 'show'])->name('setting-bulanan.show');


    Route::get('/setting-tahunan/{id}', [SettingTahunanController::class, 'index'])->name('setting-tahunan.index');
    Route::get('/setting-tahunan/get-data/{kelasId}', [SettingTahunanController::class, 'getData'])->name('setting-tahunan.get-data');
    Route::post('/setting-tahunan', [SettingTahunanController::class, 'store'])->name('setting-tahunan.store');
    Route::get('/setting-tahunan/edit/{id}', [SettingTahunanController::class, 'edit'])->name('setting-tahunan.edit');
    Route::put('/setting-tahunan/update/{id}', [SettingTahunanController::class, 'update'])->name('setting-tahunan.update');
    Route::delete('/setting-tahunan/destroy/{id}', [SettingTahunanController::class, 'destroy'])->name('setting-tahunan.destroy');
    Route::get('/setting-tahunan/show/{id}', [SettingTahunanController::class, 'show'])->name('setting-tahunan.show');

    Route::post('/setting-tambahan', [settingPtambahanController::class, 'store'])->name('setting-tambahan.tambah');

    Route::get('/kelola-pembayaran', [transaksiController::class, 'index'])->name('kelola-pembayaran.index');
    Route::post('/kelola-pembayaran', [transaksiController::class, 'SimpanTransaksi'])->name('kelola-pembayaran.simpan');

    Route::get ('/tahun_ajaran', [TahunAjaranController::class, 'index'])->name('tahun_ajaran.index');
    Route::post('tahun_ajaran/store', [TahunAjaranController::class, 'store'])->name('tahun_ajaran.store');
    Route::get('tahun_ajaran/create', [TahunAjaranController::class, 'create'])->name('tahun_ajaran.create');
    Route::get('tahun_ajaran/edit/{id}', [TahunAjaranController::class, 'edit'])->name('tahun_ajaran.edit');
    Route::put('tahun_ajaran/update/{id}', [TahunAjaranController::class, 'update'])->name('tahunajaran.update');
    Route::delete('tahun_ajaran/destroy/{id}', [TahunAjaranController::class, 'destroy'])->name('tahun_ajaran.destroy');
});

require __DIR__ . '/auth.php';
