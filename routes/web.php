<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bulanController;
use App\Http\Controllers\naik_kelasController;
use App\Http\Controllers\JenisPembayaranController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');



    Route::get('kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::get('kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    Route::resource('bulan', bulanController::class)->names('bulan');

    Route::get('/naik-kelas', [naik_KelasController::class, 'index'])->name('naik_kelas.index');
    Route::get('/naik-kelas/siswa/{id}', [naik_KelasController::class, 'getSiswaByKelas']);
    Route::post('/naik-kelas/simpan', [naik_KelasController::class, 'simpan'])->name('naik_kelas.simpan');

    Route::resource('pembayaran', JenisPembayaranController::class);
});

require __DIR__ . '/auth.php';
