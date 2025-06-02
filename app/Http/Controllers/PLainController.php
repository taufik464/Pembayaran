<?php

namespace App\Http\Controllers;

use App\Models\PembayaranLain;
use Illuminate\Http\Request;

class PLainController extends Controller
{
    public function index()
    {
        $lain = PembayaranLain::all();
       
        return view('staff.p-tambahan.index', compact('lain'));
    }

    public function create()
    {
        return view('staff.p-tambahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'keteraangan' => 'nullable|string|max:1000',
        ]);
        PembayaranLain::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'keteraangan' => $request->keteraangan,
        ]);

        // Logic to store data
        return redirect()->route('p-tambahan.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        // Logi
        $pembayaranLain = PembayaranLain::findOrFail($id);
        if (!$pembayaranLain) {
            return redirect()->route('p-tambahan.index')->with('error', 'Data tidak ditemukan.');
        }
        return view('staff.p-tambahan.edit', compact('pembayaranLain'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'keteraangan' => 'nullable|string|max:1000',
        ]);
        $pembayaranLain = PembayaranLain::findOrFail($id);
        if (!$pembayaranLain) {
            return redirect()->route('p-tambahan.index')->with('error', 'Data tidak ditemukan.');
        }
        $pembayaranLain->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'keteraangan' => $request->keteraangan,
        ]);
        // Logic to update data
        if (!$pembayaranLain) {
            return redirect()->route('p-tambahan.index')->with('error', 'Data tidak ditemukan.');
        }
        $pembayaranLain->save();
        // Logic to save updated data   
        return redirect()->route('p-tambahan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaranLain = PembayaranLain::findOrFail($id);
        if (!$pembayaranLain) {
            return redirect()->route('p-tambahan.index')->with('error', 'Data tidak ditemukan.');
        }
        $pembayaranLain->delete();
        return redirect()->route('p-tambahan.index')->with('success', 'Data berhasil dihapus.');
    }
}
