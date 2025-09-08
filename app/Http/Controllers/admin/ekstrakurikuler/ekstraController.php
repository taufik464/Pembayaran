<?php

namespace App\Http\Controllers\admin\ekstrakurikuler;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ekstraController extends Controller
{
    public function index()
    {
        $ekskul = Ekstrakurikuler::all();


        return view('admin.ekstrakurikuler.index')->with('ekskul', $ekskul);
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pembina' => 'required|string|max:255',
            'jadwal' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama ekstrakurikuler wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'pembina.required' => 'Nama pembina wajib diisi.',
            'jadwal.required' => 'Jadwal wajib diisi.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.'
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('ekstra', 'public');
        }

        Ekstrakurikuler::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imagePath,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
        ]);
        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', [
            'ekstra' => $ekstrakurikuler,
        ]);
    }

    // Update data
    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        // Validasi input
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pembina'   => 'required|string|max:255',
            'jadwal'    => 'required|string|max:255',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Data update
        $data = $request->only(['nama', 'deskripsi', 'pembina', 'jadwal']);

        // Cek apakah ada file gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($ekstrakurikuler->gambar && Storage::exists('public/' . $ekstrakurikuler->gambar)) {
                Storage::delete('public/' . $ekstrakurikuler->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('ekstrakurikuler', 'public');
            $data['gambar'] = $path;
        }

        // Update ke database
        $ekstrakurikuler->update($data);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.ekstrakurikuler')
            ->with('success', 'Data berhasil diupdate.');
    }

    // Hapus data
    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler')
            ->with('success', 'Data berhasil dihapus.');
    }
}
