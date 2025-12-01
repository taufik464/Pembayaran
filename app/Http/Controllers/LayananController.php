<?php

namespace App\Http\Controllers;
use App\Models\kontak;

use App\Models\Prestasi;
use App\Models\IdentitasSekolah;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function kontak()
    {
        $identitas = IdentitasSekolah::first();
         $kontaks = kontak::all();
        return view('layanan.kontak', compact('kontaks', 'identitas'));
    }

   
}
