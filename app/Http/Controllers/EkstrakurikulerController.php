<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::all();
        return view('ekstrakurikuler.index', compact('ekstrakurikulers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'pembina' => 'required',
            'jadwal' => 'required',
            'gambar' => 'required|image'
        ]);

        $imagePath = $request->file('gambar')->store('ekstrakurikuler', 'public');

        Ekstrakurikuler::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
            'gambar' => $imagePath
        ]);

        return back()->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->update($request->all());
        return back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
