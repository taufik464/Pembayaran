<?php

namespace App\Http\Controllers\Admin\Achive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Storage;

class AchiveController extends Controller
{
    // Tampilkan semua data prestasi
    public function index()
    {
        $achives = Prestasi::all();
        return view('admin.achive.index', compact('achives'));
    }

    // Tampilkan form create
    public function create()
    {
        return view('admin.achive.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tingkat'   => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'jenis'     => 'required|in:sekolah,siswa',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('prestasi', 'public');
        }

        Prestasi::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tingkat'   => $request->tingkat,
            'tanggal'   => $request->tanggal,
            'jenis'     => $request->jenis,
            'gambar'    => $imagePath,
        ]);

        return redirect()->route('achive.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $achive = Prestasi::findOrFail($id);
        return view('admin.achive.edit', compact('achive'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $achive = Prestasi::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tingkat'   => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'jenis'     => 'required|in:sekolah,siswa',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tingkat', 'tanggal', 'jenis']);

        if ($request->hasFile('gambar')) {
            if ($achive->gambar && Storage::exists('public/' . $achive->gambar)) {
                Storage::delete('public/' . $achive->gambar);
            }
            $path = $request->file('gambar')->store('prestasi', 'public');
            $data['gambar'] = $path;
        }

        $achive->update($data);

        return redirect()->route('achive.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $achive = Prestasi::findOrFail($id);

        if ($achive->gambar && Storage::exists('public/' . $achive->gambar)) {
            Storage::delete('public/' . $achive->gambar);
        }

        $achive->delete();

        return redirect()->route('achive.index')->with('success', 'Data berhasil dihapus.');
    }
}
