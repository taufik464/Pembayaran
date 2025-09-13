<?php

namespace App\Http\Controllers;

use App\Models\Admin\ProfilSekolah;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $ekstra = Ekstrakurikuler::latest()->take(3)->get();
        $sambuatan = ProfilSekolah::where('kategori', 'Sambutan')->first();
        $beritaTerbaru = Berita::latest()->take(3)->get();
        $berita = Berita::latest()->paginate(6);
        return view('beranda.index', [
            'title' => 'Beranda',
            'beritaTerbaru' => $beritaTerbaru,
            'ekstra' => $ekstra,
            'sambutan' => $sambuatan,
            'berita' => $berita
        ]);
    }

    public function tentang()
    {
        $tentang = ProfilSekolah::where('kategori', 'tentang kami')->first();
        return view('tentang.index', ['tentang' => $tentang],); // BUKAN 'beranda.tentang'
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
