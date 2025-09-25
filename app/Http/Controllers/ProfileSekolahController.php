<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function sambutan()
    {
        // Ambil data sambutan, pastikan kategori di DB = "Sambutan"
        $sambutan = ProfileSekolah::where("kategori", "Sambutan")->first();

        return view('profile-sekolah.sambutan', [
            'title' => 'Sambutan Kepala Sekolah',
            'sambutan' => $sambutan
        ]);
    }

    public function visiMisi()
    {
        // Ambil data visi & misi
        $visi = ProfileSekolah::where("kategori", "Visi")->first();
        $misi = ProfileSekolah::where("kategori", "Misi")->first();

        return view('profile-sekolah.visi-misi', [
            'title' => 'Visi dan Misi',
            'visi' => $visi,
            'misi' => $misi
        ]);
    }

    public function sejarah()
    {
        // Pastikan kapitalisasi sesuai dengan database → "Sejarah"
        $sejarah = ProfileSekolah::where("kategori", "Sejarah")->first();

        return view('profile-sekolah.sejarah', [
            'title' => 'Sejarah Sekolah',
            'sejarah' => $sejarah
        ]);
    }
}
