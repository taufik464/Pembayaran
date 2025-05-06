<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->latest()->paginate(10);
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Validate and store the data
        // Redirect or return a response
    }

    public function show($id)
    {
        // Retrieve and display a specific siswa
    }

    public function edit($id)
    {
        // Retrieve and display the edit form for a specific siswa
    }

    public function update(Request $request, $id)
    {
        // Validate and update the siswa data
        // Redirect or return a response
    }

    public function destroy($id)
    {
        // Delete the siswa
        // Redirect or return a response
    }
}
