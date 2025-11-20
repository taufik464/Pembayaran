<?php

namespace App\Http\Controllers\admin\alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alumni;
class alumniController extends Controller
{
    public function index()
    {
        $alumni = alumni::paginate(20);
        return view('admin.alumni.index', ['alumni' => $alumni]);
    }

    // --- IGNORE ---
    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'kuliah' => 'nullable|string|max:255',
            'tempat_kuliah' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'tempat_kerja' => 'nullable|string|max:255',
            'pesan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);
        $imagePath = null;
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('alumni', 'public');
        }
        alumni::create([
            'nama' => $request->nama,
            'tahun_lulus' => $request->tahun_lulus,
            'kuliah' => $request->kuliah,
            'tempat_kuliah' => $request->tempat_kuliah,
            'pekerjaan' => $request->pekerjaan,
            'tempat_kerja' => $request->tempat_kerja,
            'pesan' => $request->pesan,
            'foto' => $imagePath,
        ]);
        return redirect()->route('admin.alumni')->with('success', 'Alumni created successfully.');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    { $alumni = alumni::findOrFail($id);
        return view('admin.alumni.edit', ['alumni' => $alumni]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'kuliah' => 'nullable|string|max:255',
            'tempat_kuliah' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'tempat_kerja' => 'nullable|string|max:255',
            'pesan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('alumni', 'public');
            $request->merge(['foto' => $imagePath]);
        }

        $alumni = alumni::findOrFail($id);
        $alumni->update($request->all());

        return redirect()->route('admin.alumni')->with('success', 'Alumni updated successfully.');
    }
    public function destroy($id)
    {
        $alumni = alumni::findOrFail($id);
        $alumni->delete();
        return redirect()->route('admin.alumni')->with('success', 'Alumni deleted successfully.');
    }

}
