<?php

namespace App\Http\Controllers;

use App\Models\PembayaranLain;
use App\Models\PTambahan;

use Illuminate\Http\Request;

class settingPtambahanController extends Controller
{
   

    public function store(Request $request)
    {
        // Logic to handle storing additional payment settings
        $request->validate([
            'pt_id' => ['required', 'array'],
            'pt_id.*' => ['required', 'exists:jenis_pembayarans,id'],
            'siswa_id' => 'required|exists:siswa,nis',
        ]);

        foreach ($request->pt_id as $ptId) {
            $nominal = PembayaranLain::where('id', $ptId)->value('harga');

            PTambahan::create([
            'pembayaran_lain_id' => $ptId,
            'siswa_id' => $request->siswa_id,
            'harga' => $nominal,
            ]);
        }


        // Save the additional payment setting logic here

        return redirect()->to(route('kelola-pembayaran.index', ['nis' => $request->siswa_id]) . '#tambahan')
            ->with('success', 'Setting saved successfully.');
    }
}
