<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->latest()->paginate(10);
        return view('staff.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('staff.siswa.tambah', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswa',
            'nisn' => 'required|string|max:255|unique:siswa',
            'kelas_id' => 'required|exists:kelas,id',
            'no_hp' => 'nullable|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('siswa_foto', 'public');
        }

        $siswaData = $request->except('foto');
       // $user = User::create([

       //     'username' => $request->nis,
       //     'password' => bcrypt($request->nisn),
       // ]);

       // $siswaData['user_id'] = $user->id;
        $siswaData['foto'] = $fotoPath;

        Siswa::create($siswaData);

        return redirect()->route('siswa.index')->with('success', 'Siswa created successfully.');
    }

    public function show($id)
    {
        // Retrieve and display a specific siswa
    }

    public function edit($id)
    {
        // Find the siswa by ID
        $siswa = Siswa::with('kelas')->findOrFail($id);
        $kelas = Kelas::all();

        return view('staff.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswa,nis,' . $id,
            'nisn' => 'required|string|max:255|unique:siswa,nisn,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
            'no_hp' => 'nullable|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswaData = $request->except('foto');

        if ($request->hasFile('foto')) {
            // Delete the old photo if it exists
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $siswaData['foto'] = $request->file('foto')->store('siswa_foto', 'public');
        }

        $siswa->update($siswaData);

        return redirect()->route('siswa.index')->with('success', 'Siswa updated successfully.');
    }

    public function destroy($id)
    {
        // Find the siswa by ID
        $siswa = Siswa::findOrFail($id);

        // Delete the siswa
        $siswa->delete();

        // Redirect or return a response
        return redirect()->route('siswa.index')->with('success', 'Siswa deleted successfully.');
    }
}
