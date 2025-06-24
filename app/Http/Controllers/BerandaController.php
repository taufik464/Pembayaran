<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::latest()->take(3)->get();
        return view('beranda.index', [
            'title' => 'Beranda',
            'beritaTerbaru' => $beritaTerbaru
        ]);
    }

    public function tentang()
{
    return view('tentang.index'); // BUKAN 'beranda.tentang'
}


    public function ekstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('beranda.ekstrakurikuler', [
            'title' => 'Ekstrakurikuler',
            'ekstrakurikuler' => $ekstrakurikuler
        ]);
    }

    public function berita()
    {
        $berita = Berita::latest()->paginate(6);
        return view('beranda.berita', [
            'title' => 'Berita',
            'berita' => $berita
        ]);
    }
}
