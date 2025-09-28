<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::all();
        return view('prestasi.index', compact('prestasi'));
    }

    public function prestasiSekolah()
    {
        $prestasi = Prestasi::where('jenis', 'sekolah')->get();

        if ($prestasi->isEmpty()) {
            return redirect()->back()->with('error', 'Data prestasi sekolah tidak ditemukan.');
        }

        return view('layanan.prestasi-sekolah', compact('prestasi'));
    }

    public function prestasiSiswa()
    {
        $prestasi = Prestasi::where('jenis', 'siswa')->get();
        return view('layanan.prestasi-siswa', compact('prestasi'));
    }
}
