<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\Kelas;

use Illuminate\Http\Request;

class naik_kelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('staff.naik_kelas.index', compact('kelas'));
    }

    public function getSiswaByKelas($id)
    {
        $siswa = Siswa::where('kelas_id', $id)->with('kelas')->get();
        return view('staff.naik_kelas.siswa_tabel', compact('siswa'))->render();
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kelas_tujuan' => 'required',
            'siswa' => 'required|array'
        ]);

        Siswa::whereIn('nis', $request->siswa)->update([
            'kelas_id' => $request->kelas_tujuan
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil dipindahkan ke kelas tujuan.');
    }
}
