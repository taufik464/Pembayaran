<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function sambutan()
    {
        $sambutan = ProfileSekolah::where("judul", "Sambutan Kepala Sekolah")->first();
        return view('profile-sekolah.sambutan', [
            'title' => 'Sambutan Kepala Sekolah', 'sambutan' => $sambutan
        ]);
    }

    public function visiMisi()
    {
        return view('profile-sekolah.visi-misi', [
            'title' => 'Visi dan Misi'
        ]);
    }

    public function sejarah()
    {
        return view('profile-sekolah.sejarah', [
            'title' => 'Sejarah Sekolah'
        ]);
    }
}
