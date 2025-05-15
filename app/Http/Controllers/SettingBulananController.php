<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PBulanan;
use App\Models\JenisPembayaran;
use App\Models\Bulan;
use App\Models\Siswa;





use Illuminate\Http\Request;

class SettingBulananController extends Controller
{
    public function index($Id)
    {

        $pembayaran = JenisPembayaran::with('periode')->findOrFail($Id);
        $bulan = bulan::all();

        // Kelas bisa kamu filter jika perlu berdasarkan tahun ajaran
        $kelas = Kelas::all();

        return view('staff.setting_pembayaran.S_Bulanan', compact('pembayaran', 'kelas', 'bulan'));
    }

    // Simpan tarif tiap bulan per kelas
    public function store(Request $request)
    {
        // Validasi input request
        $request->validate([
            'jenis_pembayaran' => 'required|exists:jenis_pembayarans,id',
            'kelas_id' => 'required',
            'bulan' => 'required|array',
            'nominal' => 'required|array',
        ]);

        // Ambil daftar bulan dan nominal dari request
        $bulanList = $request->bulan;
        $nominalList = $request->nominal;

        // Pastikan jumlah bulan dan nominal sesuai
        if (count($bulanList) !== count($nominalList)) {
            return back()->withErrors(['Data bulan dan nominal tidak sesuai.']);
        }

        // Ambil daftar siswa berdasarkan kelas yang dipilih
        $siswaList = $this->getSiswaList($request->kelas_id);

        if (!$siswaList) {
            return back()->withErrors(['Kelas tidak ditemukan atau tidak ada siswa dalam kelas tersebut.']);
        }

        // Insert data ke PBulanan untuk setiap siswa dan bulan
        foreach ($siswaList as $siswa) {
            // Pastikan siswa memiliki NIS
            if (!$siswa->nis) {
                return back()->withErrors(['Siswa dengan NIS ' . $siswa->nis . ' tidak ditemukan.']);
            }

            foreach ($bulanList as $index => $bulan) {
                $nominal = $nominalList[$index] ?? 0;

                // Skip jika nominal tidak valid (<= 0)
                if ($nominal <= 0) {
                    continue;
                }

                // Cek apakah pembayaran sudah ada untuk siswa, jenis pembayaran, dan bulan yang sama
                $existingPayment = PBulanan::where('siswa_id', $siswa->nis)
                    ->where('jenis_pembayaran_id', $request->jenis_pembayaran)
                    ->where('bulan_id', $bulan)
                    ->first();

                // Jika sudah ada, lewati penyimpanan data ini
                if ($existingPayment) {
                    return back()->withErrors(['Siswa dengan NIS ' . $siswa->nis . ' sudah memiliki pembayaran untuk bulan ini dengan jenis pembayaran yang sama.']);
                }

                // Insert data pembayaran bulanan ke PBulanan
                PBulanan::create([
                    'siswa_id' => $siswa->nis, // Gunakan NIS sebagai ID
                    'jenis_pembayaran_id' => $request->jenis_pembayaran,
                    'bulan_id' => $bulan,
                    'harga' => $nominal,
                ]);
            }
        }

        return redirect()->route('jenis-pembayaran.index')
            ->with('success', 'Data setting bulanan berhasil disimpan.');
    }

    /**
     * Mengambil daftar siswa berdasarkan kelas ID atau semua siswa.
     * 
     * @param string|int $kelas_id
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    private function getSiswaList($kelas_id)
    {
        // Cek jika 'all' dipilih atau jika ID kelas valid
        if ($kelas_id === 'all') {
            return Siswa::all();
        }

        // Cari kelas berdasarkan ID dan ambil siswa yang terhubung dengan kelas tersebut
        $kelas = Kelas::find($kelas_id);
        if (!$kelas) {
            return null; // Kembalikan null jika kelas tidak ditemukan
        }

        return $kelas->siswa; // Kembalikan siswa yang terhubung dengan kelas
    }
}
