<?php

namespace App\Http\Controllers;
use App\Models\kontak;

use App\Models\Prestasi;
use App\Models\IdentitasSekolah;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function kontak()
    {
        $identitas = IdentitasSekolah::first();
         $kontaks = kontak::all();
        return view('layanan.kontak', compact('kontaks', 'identitas'));
    }

    public function prestasiSekolah()
    {
        $prestasi = Prestasi::where('jenis', 'sekolah')->get();
        return view('layanan.prestasi-sekolah', [
            'title' => 'Prestasi Sekolah',
            'prestasi' => $prestasi
        ]);
    }

    public function prestasiSiswa()
    {
        $prestasi = Prestasi::where('jenis', 'siswa')->get();
        return view('layanan.prestasi-siswa', [
            'title' => 'Prestasi Siswa',
            'prestasi' => $prestasi
        ]);
    }
}
