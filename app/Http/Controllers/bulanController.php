<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bulan;

class bulanController extends Controller
{
    public function index()
    {

        $bulans = bulan::all();

        return view('staff.bulan.index', compact('bulans'));
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

        // Create a new month
        bulan::create($request->all());

        // Redirect or return a response
        return redirect()->route('bulan.index')
            ->with('success', 'Month created successfully.');
    }


    public function update(Request $request, bulan $bulan)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        // Find the month by ID
        $bulan = bulan::findOrFail($request->id);
        // Update the month with the validated data
        $bulan->update([
            'nama' => $request->nama,
        ]);
        // Save the changes
        return redirect()->route('bulan.index')
            ->with('success', 'Month updated successfully.');
    }
}
