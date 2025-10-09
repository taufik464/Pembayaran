<?php

namespace App\Http\Controllers\admin\identitas;

use App\Http\Controllers\Controller;
use App\Models\IdentitasSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IdentitasSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identitas = IdentitasSekolah::all();
        return view('admin.identitas.index')->with('identitas', $identitas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'required|string|max:255|unique:identitas_sekolahs,npsn',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'jam_operasi' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        IdentitasSekolah::create($data);

        return redirect()->route('admin.identitas.index')->with('success', 'Identitas sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IdentitasSekolah $identitasSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IdentitasSekolah $identitasSekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IdentitasSekolah $identitasSekolah)
    {
      
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => "required|string|max:255|unique:identitas_sekolahs,npsn," . $identitasSekolah->id,
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'jam_operasi' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
  

        if ($request->hasFile('logo')) {
            if ($identitasSekolah->logo) {
                Storage::disk('public')->delete($identitasSekolah->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
         

        $identitasSekolah->update($data);

        return redirect()->route('admin.identitas.index')->with('success', 'Identitas sekolah berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IdentitasSekolah $identitasSekolah)
    {
        //
    }
}
