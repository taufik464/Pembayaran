<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Category;
use App\Models\GalleryInformasi;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCategories()
    {
        return Category::select('name')->get();
    }



    public function byKategori($categoryId)
    {
        $kategori = Category::findOrFail($categoryId)->name;
        $informasi = Information::with('galleryInformasis')
            ->where('category_id', $categoryId)
            ->paginate(10);
        return view('informasi.informasi', compact('informasi', 'kategori'));
    }
    public function show(string $id)
    {
        $informasi = Information::with('galleryInformasis')->findOrFail($id);
        return view('informasi.show', compact('informasi'));
    }

    public function gallery()
    {
        $galleries = GalleryInformasi::with('information')->paginate(5);
        return view('informasi.gallery', compact('galleries'));
    }
}
