<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PBulanan;
use App\Models\JenisPembayaran;

use App\Models\Siswa;





use Illuminate\Http\Request;

class SettingBulananController extends Controller
{
    public function index($Id)
    {

        $pembayaran = JenisPembayaran::with('periode')->findOrFail($Id);
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

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
                    ->where('bulan', $bulan)
                    ->first();

                // Jika sudah ada, lewati penyimpanan data ini
                if ($existingPayment) {
                    return back()->withErrors(['Siswa dengan NIS ' . $siswa->nis . ' sudah memiliki pembayaran untuk bulan ini dengan jenis pembayaran yang sama.']);
                }

                // Insert data pembayaran bulanan ke PBulanan
                PBulanan::create([
                    'siswa_id' => $siswa->nis, // Gunakan NIS sebagai ID
                    'jenis_pembayaran_id' => $request->jenis_pembayaran,
                    'bulan' => $bulan,
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

    public function show($nis)
    {

        // Cari semua pembayaran bulanan untuk siswa dengan nis tertentu
        $bulanan = PBulanan::with(['siswa.kelas', 'jenisPembayaran', 'bulan'])
            ->where('siswa_id', $nis)          // filter berdasarkan kolom nis di tabel p_bulanan
            ->get();

        // Jika tidak ada data, tampilkan 404
        if ($bulanan->isEmpty()) {
            abort(404, 'Data pembayaran bulanan untuk NIS ' . $nis . ' tidak ditemukan.');
        }

        // Kirim collection $bulanan ke view
        return view('staff.p_bulanan.tabel', compact('bulanan', 'nis'));
    }

    public function edit($id)
    {
        $settingBulanan = PBulanan::findOrFail($id);
        $pembayaran = JenisPembayaran::with('periode')->findOrFail($settingBulanan->jenis_pembayaran_id);
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        $kelas = Kelas::all();

        return view('staff.setting_pembayaran.edit_S_Bulanan', compact('settingBulanan', 'pembayaran', 'kelas', 'bulan'));
    }
    public function update(Request $request, $id)
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

        // Update data ke PBulanan untuk setiap siswa dan bulan
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
                    ->where('bulan', $bulan)
                    ->first();

                // Jika sudah ada, lewati penyimpanan data ini
                if ($existingPayment) {
                    return back()->withErrors(['Siswa dengan NIS ' . $siswa->nis . ' sudah memiliki pembayaran untuk bulan ini dengan jenis pembayaran yang sama.']);
                }

                // Update data pembayaran bulanan ke PBulanan
                PBulanan::updateOrCreate(
                    [
                        'siswa_id'
                        => $siswa->nis, // Gunakan NIS sebagai ID
                        'jenis_pembayaran_id' => $request->jenis_pembayaran,
                        'bulan' => $bulan,
                    ],
                    [
                        'harga' => $nominal,
                    ]
                );
            }
        }
        return redirect()->route('jenis-pembayaran.index')
            ->with('success', 'Data setting bulanan berhasil diubah.');
    }
    public function destroy($nis, $id)
    {
        $bulanan = PBulanan::findOrFail($id);

        // Cek status lunas (misalnya id_transaksi tidak null)
        if ($bulanan->status === 'Lunas') {
            return redirect()->route('setting-bulanan.show', ['nis' => $nis])
                ->with('error', 'Data tidak bisa dihapus karena sudah lunas.');
        }

        $bulanan->delete();

        return redirect()->route('setting-bulanan.show', ['nis' => $nis])
            ->with('success', 'Data setting bulanan berhasil dihapus.');
    }
}
