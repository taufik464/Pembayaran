<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PTahunan;
use App\Models\JenisPembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SettingTahunanController extends Controller
{
    public function index($id)
    {
        $pembayaran = JenisPembayaran::with('periode')->findOrFail($id);
        $kelasList = Kelas::all();

        return view('staff.setting_pembayaran.S_Tahunan', compact('pembayaran', 'kelasList'));
    }

    public function getData($kelasId)
    {
        if ($kelasId === 'all') {
            $kelas = Kelas::all();
            return view('staff.setting_pembayaran.tabel_setting_tahunan', [
                'kelas' => $kelas,
                'siswa' => null
            ]);
        } else {
            $siswa = Siswa::with('kelas')->where('kelas_id', $kelasId)->get();
            return view('staff.setting_pembayaran.tabel_setting_tahunan', [
                'kelas' => null,
                'siswa' => $siswa
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pembayaran_id' => 'required|exists:jenis_pembayaran,id',
            'nominal' => 'required|numeric',
            'siswa' => 'required|array|min:1',
        ]);

        foreach ($request->siswa as $siswaId) {
            // Simpan tarif per siswa
            PTahunan::updateOrCreate([
                'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
                'siswa_id' => $siswaId,
            ], [
                'harga' => $request->nominal,
            ]);
        }

        return redirect()->route('jenis-pembayaran.index')->with('success', 'Tarif berhasil disimpan.');
    }
}
