<?php

namespace App\Http\Controllers\admin\informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Category;

class kategoriController extends Controller
{
    public function index()
    {
        $kategori = Category::all();
        return view('admin.informasi.kategori.index', compact('kategori'));
    }

    public function show($id)
    {
        $informasi = Information::where('category_id', $id)->get();
        return view('admin.informasi.info.index', compact('informasi'));
    }
    public function tambah()
    {
        return view('admin.informasi.kategori.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = Category::findOrFail($id);
        return view('admin.informasi.kategori.edit', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $kategori = Category::findOrFail($id);
        $kategori->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
