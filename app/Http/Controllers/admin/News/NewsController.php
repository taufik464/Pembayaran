<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = Berita::orderBy('created_at', 'desc')->get();
        return view('admin.content.news.index')->with('news', $news);
    }

    public function create()
    {
        return view('admin.content.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'penulis' => 'required|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('news', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->isi,
            'gambar' => $imagePath,
            'penulis' => $request->penulis,
            'slug' => Str::slug($request->judul),
        ]);

        return redirect()->route('admin.news')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.content.news.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'penulis' => 'required|string|max:255',
        ]);

        $berita = Berita::findOrFail($id);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->isi,
            'penulis' => $request->penulis,
            'slug' => Str::slug($request->judul),
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::exists('public/' . $berita->gambar)) {
                Storage::delete('public/' . $berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('news', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.news')->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar && Storage::exists('public/' . $berita->gambar)) {
            Storage::delete('public/' . $berita->gambar);
        }
        $berita->delete();

        return redirect()->route('admin.news')->with('success', 'Berita berhasil dihapus.');
    }
}
