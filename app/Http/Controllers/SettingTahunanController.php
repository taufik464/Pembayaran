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
            'jenis_pembayaran_id' => 'required|exists:jenis_pembayarans,id',
            'tarif' => 'required|decimal:0,2',
            'siswa' => 'required|array|min:1',
        ]);

        foreach ($request->siswa as $siswaId) {
            PTahunan::updateOrCreate([
                'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
                'siswa_id' => $siswaId,
            ], [
                'harga' => $request->tarif,
            ]);
        }

        return redirect()->route('jenis-pembayaran.index')->with('success', 'Tarif berhasil disimpan.');
    }

    public function destroy($id)
    {
        $pembayaran = PTahunan::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('jenis-pembayaran.index')->with('success', 'Data berhasil dihapus.');
    }
    public function edit($id)
    {
        $pembayaran = PTahunan::findOrFail($id);
        return view('staff.setting_pembayaran.edit_tahunan', compact('pembayaran'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_pembayaran_id' => 'required|exists:jenis_pembayarans,id',
            'tarif' => 'required|decimal:0,2',
        ]);

        $pembayaran = PTahunan::findOrFail($id);
        $pembayaran->update([
            'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
            'harga' => $request->tarif,
        ]);

        return redirect()->route('jenis-pembayaran.index')->with('success', 'Data berhasil diubah.');
    }
}
