<?php

namespace App\Http\Controllers\admin\galeri;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Gallery::all();
        return view('admin.galeri.index')->with('galeri', $galeri);
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'nullable|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.'
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('galeri', 'public');
        }

        Gallery::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'gambar' => $imagePath,
        ]);
        return redirect()->route('admin.galeri')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(Gallery $gallery)
    {
        return view('admin.galeri.edit', [
            'galeri' => $gallery,
        ]);
    }

    // Update data
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'nullable|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal']);

        if ($request->hasFile('gambar')) {
            if ($gallery->gambar && Storage::exists('public/' . $gallery->gambar)) {
                Storage::delete('public/' . $gallery->gambar);
            }
            $path = $request->file('gambar')->store('galeri', 'public');
            $data['gambar'] = $path;
        }

        $gallery->update($data);

        return redirect()->route('admin.galeri')
            ->with('success', 'Data berhasil diupdate.');
    }

    // Hapus data
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galeri')
            ->with('success', 'Data berhasil dihapus.');
    }
}
