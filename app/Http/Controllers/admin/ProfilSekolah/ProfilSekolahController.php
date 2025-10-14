<?php

namespace App\Http\Controllers\Admin\ProfilSekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\ProfilSekolah;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::all();
        return view('admin.content.profil.index', compact('profil'));
    }

    public function create()
    {
        return view('admin.content.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:Sambutan,tentang kami,sejarah,Visi,Misi,Lainnya',
            'isi'   => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profil', 'public');
        }

        ProfilSekolah::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi'   => $request->isi,
            'image' => $imagePath,
        ]);

        return redirect()->route('profil.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $profil = ProfilSekolah::findOrFail($id);
        return view('admin.content.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:Sambutan,tentang kami,sejarah,Visi,Misi',
            'isi'   => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profil = ProfilSekolah::findOrFail($id);

        // update gambar jika ada upload baru
        if ($request->hasFile('image')) {
            if ($profil->image && Storage::disk('public')->exists($profil->image)) {
                Storage::disk('public')->delete($profil->image);
            }
            $profil->image = $request->file('image')->store('profil', 'public');
        }

        $profil->judul = $request->judul;
        $profil->isi   = $request->isi;
        $profil->kategori = $request->kategori;
        $profil->save();

        return redirect()->route('profil.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        if ($profil->image && Storage::disk('public')->exists($profil->image)) {
            Storage::disk('public')->delete($profil->image);
        }

        $profil->delete();

        return redirect()->route('profil.index')->with('success', 'Data berhasil dihapus!');
    }
}
