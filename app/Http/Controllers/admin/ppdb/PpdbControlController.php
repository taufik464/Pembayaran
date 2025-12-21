<?php

namespace App\Http\Controllers\admin\ppdb;

use App\Http\Controllers\Controller;
use App\Models\PpdbApplicant;
use App\Models\PpdbControl;
use App\Models\data_ppdb;
use App\Exports\PpdbExport;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class PpdbControlController extends Controller
{
    public function index()
    {
        // Ambil data kontrol (asumsi hanya ada 1 baris konfigurasi)
        $control = PpdbControl::first() ?? new PpdbControl();

        // Ambil statistik sederhana untuk dashboard
        $stats = [
            'total_pendaftar' => data_ppdb::count(),
        ];
        $status = PpdbControl::active()->first();
        

        return view('admin.ppdb.index', compact('control', 'stats', 'status'));
    }

    public function updateControl(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $control = PpdbControl::first() ?? new PpdbControl();
        $control->title = $request->title;
        $control->description = $request->description;
        $control->start_date = $request->start_date;
        $control->end_date = $request->end_date;
        $control->is_active = $request->has('is_active'); // Checkbox logic
        $control->save();

        return redirect()->back()->with('success', 'Pengaturan PPDB berhasil diperbarui!');
    }

    public function list()
    {
        $list_pendaftar = data_ppdb::latest()->paginate(30);
        return view('admin.ppdb.list', compact('list_pendaftar'));
    }

    public function export()
    {
        return Excel::download(new PpdbExport, 'daftar-pendaftar-ppdb.xlsx');
    } 

    public function showApplicant($id)
    {
        $applicant = data_ppdb::findOrFail($id);
        return view('admin.ppdb.detail', compact('applicant'));
    }

    public function downloadZip()
    {
        $zip = new ZipArchive;
        $zipFileName = 'PPDB_FULL_DATA_' . date('Ymd_His') . '.zip';
        $zipPath = public_path($zipFileName);

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

            // 1. GENERATE EXCEL
            $excelName = 'Data_Pendaftar.xlsx';
            // Simpan sementara di disk public (storage/app/public)
            Excel::store(new PpdbExport, $excelName, 'public');

            $excelFullPath = storage_path('app/public/' . $excelName);
            if (File::exists($excelFullPath)) {
                $zip->addFile($excelFullPath, $excelName);
            }

            // 2. MASUKKAN DOKUMEN (KK & SKL)
            $pendaftars = \App\Models\data_ppdb::all();

            // Buat folder 'dokumen' di dalam ZIP agar rapi
            $zip->addEmptyDir('dokumen');

            foreach ($pendaftars as $siswa) {
                // Menangani Kartu Keluarga
                if ($siswa->kk_path) {
                    $this->addFileToZip($zip, $siswa->kk_path, 'dokumen');
                }

                // Menangani SKL/Foto
                if ($siswa->skl_path) {
                    $this->addFileToZip($zip, $siswa->skl_path, 'dokumen');
                }
            }

            $zip->close();

            // 3. CLEANUP & DOWNLOAD
            if (File::exists($excelFullPath)) {
                File::delete($excelFullPath);
            }

            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        return back()->with('error', 'Gagal membuat ZIP');
    }

    /**
     * Fungsi Helper untuk memastikan file ada sebelum di-zip
     */
    private function addFileToZip($zip, $dbPath, $folderInZip)
    {
        // Path fisik sesuai dengan fungsi store('...', 'public')
        $fullPath = storage_path('app/public/' . $dbPath);

        if (File::exists($fullPath) && is_file($fullPath)) {
            // basename mengambil nama file saja (menghilangkan folder uploads/kk/)
            $fileName = basename($dbPath);
            $zip->addFile($fullPath, $folderInZip . '/' . $fileName);
        }
    }

    
}
