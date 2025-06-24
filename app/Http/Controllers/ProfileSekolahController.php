<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function sambutan()
    {
        return view('profile-sekolah.sambutan', [
            'title' => 'Sambutan Kepala Sekolah'
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
