<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function sambutan()
    {
        $sambutan = ProfileSekolah::where("kategori", "Sambutan")->first();
        return view('profile-sekolah.sambutan', [
            'title' => 'Sambutan Kepala Sekolah',
            'sambutan' => $sambutan
        ]);
    }

    public function visiMisi()
    {
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
        $sejarah = ProfileSekolah::where("kategori", "sejarah")->first();

        return view('profile-sekolah.sejarah', [
            'title' => 'Sejarah Sekolah',
            'sejarah' => $sejarah
        ]);
    }
}
