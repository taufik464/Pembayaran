<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use App\Models\Periode;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_pembayaran = JenisPembayaran::with('periode')->paginate(10);
        return view('staff.jenis_pembayaran.index', compact('jenis_pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $tipe = ['Bulanan', 'Tahunan'];
        $tahun = Periode::all();
        return view('staff.jenis_pembayaran.tambah', compact('tipe', 'tahun'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'periode_id' => 'required',

        ]);

        JenisPembayaran::create([
            'nama' => $request->nama,
            'tipe_pembayaran' => $request->tipe,
            'periode_id' => $request->periode_id,
        ]);

        return redirect()->route('jenis-pembayaran.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPembayaran $jenisPembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPembayaran $jenis_pembayaran)
    {
        $tipe = ['Bulanan', 'Tahunan'];
        $tahun = Periode::all();
        return view('staff.jenis_pembayaran.edit', compact('jenis_pembayaran', 'tipe', 'tahun'));
    }

    public function update(Request $request, JenisPembayaran $jenis_pembayaran)
    {
        $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'periode_id' => 'required',
        ]);

        $jenis_pembayaran->update([
            'nama' => $request->nama,
            'tipe_pembayaran' => $request->tipe,
            'periode_id' => $request->periode_id,
        ]);

        return redirect()->route('jenis-pembayaran.index')->with('success', 'Data berhasil diubah');
    }

    public function redirectSettingTarif($id)
    {
        $pembayaran = JenisPembayaran::findOrFail($id);

        if ($pembayaran->tipe_pembayaran === 'Bulanan') {
            return redirect()->route('setting-bulanan.index', 1);
        } elseif ($pembayaran->tipe_pembayaran === 'Tahunan') {
            return redirect()->route('setting-tahunan.index', $pembayaran->id);
        }

        abort(404, 'Tipe pembayaran tidak dikenali');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPembayaran $jenisPembayaran)
    {
        $jenisPembayaran->delete();
        return redirect()->route('jenis-pembayaran.index')->with('success', 'Data berhasil dihapus');
    }
}
