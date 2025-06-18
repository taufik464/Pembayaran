<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class rekapController extends Controller
{
    public function index()
    {
        $jenisP = JenisPembayaran::all();
        $siswas = Siswa::with(['kelas', 'pBulanan', 'pTahunan'])->get();
        return view('staff.rekap.index', compact('jenisP', 'siswas'));
    }

   

  
}
