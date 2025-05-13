<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

use Illuminate\Http\Request;

class kelasController extends Controller
{
    public function index()
    {

        $kelass = Kelas::all();
        return view('staff.kelas.index', compact('kelass'));
    }

    public function create()
    {

        //
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string|max:255',

        ]);

        // Create a new class
        Kelas::create($request->all());


        // Redirect or return a response
        return redirect()->route('kelas.index')
            ->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        // Find the class by ID
        $kelas = kelas::findOrFail($id);
        return view('staff.kelas.modal_update_kelas', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        // Find the class by ID
        $kelas = kelas::findOrFail($request->id);
        // Update the class with the validated data
        $kelas->update([
            'nama' => $request->nama,
        ]);
        // Save the changes
        $kelas->save();
        // Redirect or return a response

        return redirect()->route('kelas.index')
            ->with('success', 'Class created successfully.');

        // Validate and update the class
        // Redirect or return a response
    }

    public function destroy($id)
    {
        // Find the class by ID
        $kelas = kelas::findOrFail($id);

        // Delete the class
        $kelas->delete();

        // Redirect or return a response
        return redirect()->route('kelas.index')
            ->with('success', 'Class deleted successfully.');
    }
}
