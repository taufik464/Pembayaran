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
        $validated = $request->validate([
            'kelas_tujuan' => 'required',
            'siswa' => 'required|array'
        ]);

        try {
            $updated = Siswa::whereIn('nis', $validated['siswa'])
                ->update(['kelas_id' => $validated['kelas_tujuan']]);

            if ($updated === 0) {
                return redirect()->back()
                    ->with('warning', 'Tidak ada siswa yang berhasil diperbarui.');
            }

            return redirect()->back()
                ->with('success', 'Siswa berhasil dipindahkan ke kelas tujuan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
