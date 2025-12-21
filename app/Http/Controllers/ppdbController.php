<?php

namespace App\Http\Controllers;

use App\Models\data_ppdb;
use Illuminate\Http\Request;
use App\Models\PPDB; // Model untuk tabel ppdb (pengaturan)
use App\Models\PpdbApplication; // Model untuk tabel ppdb_applications (aplikasi siswa)
use App\Models\PpdbControl;

class ppdbController extends Controller
{
    /**
     * Menampilkan form PPDB jika aktif berdasarkan pengaturan.
     */
    public function landingpage()
    {
        $konten = PpdbControl::first();
        return view('ppdb.landing', compact('konten'));
    }

    public function index()
    {
        $ppdbSetting = PpdbControl::active()->first();
       
        if (!$ppdbSetting) {
            return view('ppdb.closed'); // PPDB tidak aktif / sudah ditutup
        }

        return view('ppdb.form', compact('ppdbSetting'));
    }

    /**
     * Menyimpan data form PPDB.
     */
    public function store(Request $request)
    {

       
     
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:data_ppdb,nik',
            'nisn' => 'required|string|max:20|unique:data_ppdb,nisn',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'asal_sekolah' => 'required|string|max:255',

            'hobi' => 'required|string|max:255',
            'bidang_studi' => 'required|string|max:255',
            'olahraga' => 'required|string|max:255',
            'cita_cita' => 'required|string|max:255',

            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',
            'keterangan_ayah' => 'required|in:Hidup,Meninggal',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',
            'keterangan_ibu' => 'required|in:Hidup,Meninggal',
            'nama_wali' => 'required|string|max:255',
            'pekerjaan_wali' => 'required|string|max:255',
            'penghasilan_wali' => 'required|string|max:255',
            'alamat_wali' => 'required|string',

            'skl' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
            'kk' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
       

        $sklPath = $request->file('skl') ? $request->file('skl')->store('uploads/skl', 'public') : null;
        $kkPath = $request->file('kk')->store('uploads/kk', 'public'); // wajib, aman

        $pendaftaran = data_ppdb::create([
            'nama' => $validated['nama'],
            'nik' => $validated['nik'],
            'nisn' => $validated['nisn'],
            'jk' => $validated['jk'],
            'tgl_lahir' => $validated['tgl_lahir'],
            'agama' => $validated['agama'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'asal_sekolah' => $validated['asal_sekolah'],
            'hobi' => $validated['hobi'],
            'bidang_studi' => $validated['bidang_studi'],
            'olahraga' => $validated['olahraga'],
            'cita_cita' => $validated['cita_cita'],
            'nama_ayah' => $validated['nama_ayah'],
            'pekerjaan_ayah' => $validated['pekerjaan_ayah'],
            'penghasilan_ayah' => $validated['penghasilan_ayah'],
            'keterangan_ayah' => $validated['keterangan_ayah'],
            'nama_ibu' => $validated['nama_ibu'],
            'pekerjaan_ibu' => $validated['pekerjaan_ibu'],
            'penghasilan_ibu' => $validated['penghasilan_ibu'],
            'keterangan_ibu' => $validated['keterangan_ibu'],
            'nama_wali' => $validated['nama_wali'],
            'pekerjaan_wali' => $validated['pekerjaan_wali'],
            'penghasilan_wali' => $validated['penghasilan_wali'],
            'alamat_wali' => $validated['alamat_wali'],
            'skl_path' => $sklPath,
            'kk_path' => $kkPath,
        ]);

        

        return view('ppdb.success', ['data' => $pendaftaran]);
    }


   
}
