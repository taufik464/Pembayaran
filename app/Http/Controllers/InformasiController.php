<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Category;
use App\Models\GalleryInformasi;
use App\Models\alumni;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCategories()
    {
        return Category::select('name')->get();
    }



    public function byKategori($slug, Request $request)
    {
       
        $kategori = Category::where('name', $slug)->firstOrFail();
        $keyword = $request->input('keyword');
        $informasi = Information::with('galleryInformasis')
            ->where('category_id', $kategori->id);
        if ($keyword) {
            $informasi->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('content', 'like', '%' . $keyword . '%');
            });
        }

        // 5. Lakukan Paginasi dan eksekusi query
        // Gunakan withQueryString() agar filter kategori dan keyword terbawa saat pindah halaman paginasi.
        $informasi = $informasi->paginate(10)->withQueryString();

        // 6. Kirim data ke view
        // Variabel 'keyword' juga dikirimkan untuk mengisi kembali input pencarian di view.
        return view('informasi.informasi', compact('informasi', 'kategori', 'keyword'));
    }
    public function show($id)
    {
        $informasi = Information::with('galleryInformasis')->findOrFail($id);
        return view('informasi.show', compact('informasi'));
    }


    public function gallery()
    {
        $galleries = GalleryInformasi::with('information')->paginate(5);
        return view('informasi.gallery', compact('galleries'));
    }

   
    public function alumni(Request $request)
    {
        $alumni = alumni::paginate(20);
        return view('informasi.alumni', compact('alumni'));
    }   
}
