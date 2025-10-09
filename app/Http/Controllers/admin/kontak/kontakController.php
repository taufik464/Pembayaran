<?php

namespace App\Http\Controllers\admin\kontak;

use App\Http\Controllers\Controller;
use App\Models\kontak;
use Illuminate\Http\Request;

class kontakController extends Controller
{
    public function index()
    {
        $kontak = kontak::all();
        return view('admin.kontak.index')->with('kontaks', $kontak);
    }
    public function create()
    {
        return view('admin.kontak.create');
    }
    public function store(Request $request)
    {
        // Validasi input, dengan aturan minimal salah satu antara link atau nomor wajib diisi
        $request->validate([
            'nama' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|string|max:255|required_without:nomor',
            'nomor' => 'nullable|string|max:20|required_without:link',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'link.required_without' => 'Link harus diisi jika Nomor kosong.',
            'nomor.required_without' => 'Nomor harus diisi jika Link kosong.',
        ]);

        // Inisialisasi variabel path gambar
        $imagePath = null;

        // Jika ada file gambar yang diupload, simpan ke storage dan dapatkan path-nya
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('kontak', 'public');
        }

        // Simpan data ke database
        kontak::create([
            'nama' => $request->nama,
            'image' => $imagePath,
            'link' => $request->link,
            'nomor' => $request->nomor,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kontak')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }
   public function edit($id)
{
    $kontak = Kontak::findOrFail($id);
    return view('admin.kontak.edit', compact('kontak'));
}

    public function update(Request $request, $id)
    {
        // Validasi input, dengan aturan minimal salah satu antara link atau nomor wajib diisi
        $request->validate([
            'nama' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|string|max:255|required_without:nomor',
            'nomor' => 'nullable|string|max:20|required_without:link',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'link.required_without' => 'Link harus diisi jika Nomor kosong.',
            'nomor.required_without' => 'Nomor harus diisi jika Link kosong.',
        ]);

        $kontak = kontak::findOrFail($id);

        // Inisialisasi variabel path gambar
        $imagePath = $kontak->image;

        // Jika ada file gambar yang diupload, simpan ke storage dan dapatkan path-nya
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('kontak', 'public');
        }

        // Update data di database
        $kontak->update([
            'nama' => $request->nama,
            'image' => $imagePath,
            'link' => $request->link,
            'nomor' => $request->nomor,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kontak')->with('success', 'Data berhasil diupdate.');
    }
    public function destroy($id)
    {
        $kontak = kontak::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($kontak->image) {
            \Storage::disk('public')->delete($kontak->image);
        }

        // Hapus data dari database
        $kontak->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kontak')->with('success', 'Data berhasil dihapus.');
    }
}
