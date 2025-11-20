<?php

namespace App\Http\Controllers\admin\informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Category;
use App\Models\GalleryInformasi;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;


class informationController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');
        $kategori_id = $request->input('category_id');

        $informasi = Information::with('galleryInformasis')
            ->when($title, function ($query, $title) {
                $query->where('title', 'like', "%{$title}%");
            })
            ->when($kategori_id, function ($query, $kategori_id) {
                $query->where('category_id', $kategori_id);
            })
            ->paginate(20)
            ->appends($request->only(['title', 'kategori_id'])); // biar query tetap ada saat pindah halaman

        $kategori = Category::all(); // untuk dropdown kategori di view

        return view('admin.informasi.info.index', compact('informasi', 'kategori', 'title', 'kategori_id'));
    }

   

    public function create()
    {
        $kategori = Category::all();

        return view('admin.informasi.info.create', compact('kategori'));
    }
    public function store(Request $request)
    {
        
       $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

      
        
        $informasi = Information::create([
            'title' => $validatedData['judul'],
            'content' => $validatedData['konten'],
            'category_id' => $validatedData['kategori_id'],
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('informasi', 'public');
               
                 GalleryInformasi::create([
                    'information_id' => $informasi->id,
                    'image_path' => $path,
                ]);  
                   
            }
        }
        
        return redirect()->route('admin.informasi')->with('success', 'Informasi berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $informasi = Information::with('galleryInformasis')->findOrFail($id);
        $kategori = Category::all();

        return view('admin.informasi.info.edit', [
            'informasi' => $informasi,
            'kategori' => $kategori,
            'existingImages' => $informasi->galleryInformasis->pluck('image_path')->toArray(),
        ]);
    }
    public function update(Request $request, $id)
    {
        // 🔹 Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        // 🔹 Ambil data lama
        $informasi = Information::findOrFail($id);

        // 🔹 Update data utama
        $informasi->update([
            'title' => $request->judul,
            'content' => $request->konten,
            'category_id' => $request->kategori_id,
        ]);

       

        // 🔹 Simpan gambar baru (jika ada)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('informasi', 'public');

                GalleryInformasi::create([
                    'information_id' => $informasi->id,
                    'image_path' => $path,
                ]);
            }
        }

        // 🔹 Hapus gambar lama (jika ada)
        if ($request->filled('deleted_images')) {
            // pastikan JSON valid
            $deletedImages = json_decode($request->deleted_images, true);

            if (is_array($deletedImages)) {
                foreach ($deletedImages as $path) {
                    // hapus file dari storage
                    Storage::disk('public')->delete($path);

                    // hapus record dari database
                    GalleryInformasi::where('image_path', $path)->delete();
                }
            }
        }

        // 🔹 Redirect dengan pesan sukses
        return redirect()
            ->route('admin.informasi')
            ->with('success', 'Informasi berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $informasi = Information::findOrFail($id);
        // Hapus gambar terkait dari gallery_informasi
        foreach ($informasi->galleryInformasis as $gallery) {
            // Hapus file gambar dari storage
            if (Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            $gallery->delete();
        }
        $informasi->delete();
        return redirect()->route('admin.informasi')->with('success', 'Informasi berhasil dihapus.');
    }
}
