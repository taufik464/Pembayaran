<?php

namespace App\Http\Controllers;

use App\Models\PBulanan;
use App\Models\PembayaranLain;
use App\Models\PTahunan;
use App\Models\PTambahan;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Transaksi;

class TransaksiController extends Controller
{

    public function index(Request $request)
    {
        $nis = $request->input('nis');
        $siswa = null;
        $bulanan = collect();
        $tahunan = collect();
        $tambahan = collect();

        if ($nis) {
            // Ambil data siswa berdasarkan NIS
            $siswa = Siswa::where('nis', $nis)->first();

            if ($siswa) {
                // Ambil semua data pembayaran yang berelasi dengan siswa ini
                $bulanan = PBulanan::with('jenisPembayaran')
                    ->where('siswa_id', $siswa->nis)
                    ->whereNull('transaksi_id')
                    ->get();

                $tahunan = PTahunan::with('jenisPembayaran')
                    ->where('siswa_id', $siswa->nis)
                    ->get();

                $tambahan = PTambahan::with('jenisPembayaran')
                    ->where('siswa_id', $siswa->nis)
                    ->whereNull('transaksi_id')
                    ->get();

                if ($bulanan->isEmpty() && $tahunan->isEmpty() && $tambahan->isEmpty()) {
                    session()->flash('message', 'Data tanggungan tidak ada.');
                }
            }
        }

        $Btambah = PembayaranLain::all();
        if ($Btambah->isEmpty()) {
            session()->flash('message', 'Data pembayaran tambahan tidak ada.');
        }
        

        return view('staff.transaksi.index', compact('siswa', 'bulanan', 'tahunan', 'tambahan', 'Btambah'));
    }


    public function create()
    {
        return view('transaksi.create');
    }

    public function show($id)
    {
        return view('transaksi.show', compact('id'));
    }

    public function edit($id)
    {
        return view('transaksi.edit', compact('id'));
    }
}
