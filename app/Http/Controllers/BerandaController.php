<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\faq;
use App\Models\Information;
use App\Models\Category;
use App\Models\alumni;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        //ekstra berasal dari data informasi berdasarkan kategori ekstrakulikuler
        $kategoriEkstra = Category::where('name', 'Ekstrakurikuler')->first();
        $ekstra = collect();
       
        if ($kategoriEkstra) {
            
            $ekstra = Information::with('galleryInformasis')
                ->take(3)
            ->where('category_id', $kategoriEkstra->id)->get();
        }
        $kategoriBerita = Category::where('name', 'Berita')->first();
        $berita = collect();

        if ($kategoriBerita) {

            $berita = Information::with('galleryInformasis')->latest()
                ->take(6)
                ->where('category_id', $kategoriEkstra->id)->get();
        }
        $tentangkami = ProfileSekolah::where('kategori', 'tentang kami')->first();
        
        $alumni = alumni::latest()->take(4)->get();
       
        $faqs = faq::latest()->take(5)->get();
        return view('beranda.index', [
            'title' => 'Beranda',
            
            'ekstra' => $ekstra,
            'tentangkami' => $tentangkami,
            'berita' => $berita,
            'faqs' => $faqs,
            'alumni' => $alumni
        ]);
    }

    public function faqs()
    {
        $faqs = faq::latest()->paginate(10);
        return view('beranda.faqs', ['faqs' => $faqs]);
    }

    public function tentang()
    {
        $tentang = ProfileSekolah::where('kategori', 'tentang kami')->first();
        return view('tentang.index', ['tentang' => $tentang],); // BUKAN 'beranda.tentang'
    }

    public function berita()
    {
        return route('/informasi/kategori/');
    }

    


   

   
}
