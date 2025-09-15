<?php

namespace App\Http\Controllers\admin\sapras;

use App\Http\Controllers\Controller;
use App\Models\sarpras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaprasController extends Controller
{
    public function index()
    {
        $sapras = sarpras::all();
        return view('admin.sapras.index')->with('sapras', $sapras);
    }

    public function create()
    {
        return view('admin.sapras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul SAPRAS wajib diisi.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.'
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('sapras', 'public');
        }

       sarpras::create([
            'judul' => $request->judul,
            'gambar' => $imagePath,
        ]);
        return redirect()->route('admin.sapras')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(sarpras $sapras)
    {
        return view('admin.sapras.edit', [
            'sapras' => $sapras,
        ]);
    }

    public function update(Request $request,sarpras $sapras)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul']);

        if ($request->hasFile('gambar')) {
            if ($sapras->gambar && Storage::exists('public/' . $sapras->gambar)) {
                Storage::delete('public/' . $sapras->gambar);
            }
            $path = $request->file('gambar')->store('sapras', 'public');
            $data['gambar'] = $path;
        }

        $sapras->update($data);

        return redirect()->route('admin.sapras')
            ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(sarpras $sapras)
    {
        $sapras->delete();
        return redirect()->route('admin.sapras')
            ->with('success', 'Data berhasil dihapus.');
    }
}
