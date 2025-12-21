<?php

namespace App\Exports;

use App\Models\data_ppdb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // WAJIB ADA
use Maatwebsite\Excel\Concerns\WithMapping; // UNTUK URUTAN DATA
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // AGAR LEBAR KOLOM OTOMATIS

class PpdbExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        return data_ppdb::all();
    }

    // 1. DEFINISIKAN NAMA KOLOM DI SINI
    public function headings(): array
    {
        return [
            "ID Pendaftaran",
            "Nama Lengkap",
            "NIK",
            "NISN",
            "Jenis Kelamin",
            "Tanggal Lahir",
            "Agama",
            "Alamat Tinggal",
            "No. WhatsApp",
            "Asal Sekolah",
            "Hobi",
            "Bidang Studi",
            "Olahraga",
            "Cita-cita",
            "Nama Ayah",
            "Pekerjaan Ayah",
            "Penghasilan Ayah",
            "Status Ayah",
            "Nama Ibu",
            "Pekerjaan Ibu",
            "Penghasilan Ibu",
            "Status Ibu",
            "Nama Wali",
            "Pekerjaan Wali",
            "Penghasilan Wali",
            "Alamat Wali",
            "Path SKL",
            "Path KK",
            "Waktu Pendaftaran",
            "Terakhir Update"
        ];
    }

    // 2. SESUAIKAN URUTAN DATA DENGAN HEADINGS DI ATAS
    public function map($pendaftaran): array
    {
        return [
            $pendaftaran->id,
            $pendaftaran->nama,
            $pendaftaran->nik,
            $pendaftaran->nisn,
            $pendaftaran->jk,
            $pendaftaran->tgl_lahir,
            $pendaftaran->agama,
            $pendaftaran->alamat,
            $pendaftaran->no_hp,
            $pendaftaran->asal_sekolah,
            $pendaftaran->hobi,
            $pendaftaran->bidang_studi,
            $pendaftaran->olahraga,
            $pendaftaran->cita_cita,
            $pendaftaran->nama_ayah,
            $pendaftaran->pekerjaan_ayah,
            $pendaftaran->penghasilan_ayah,
            $pendaftaran->keterangan_ayah,
            $pendaftaran->nama_ibu,
            $pendaftaran->pekerjaan_ibu,
            $pendaftaran->penghasilan_ibu,
            $pendaftaran->keterangan_ibu,
            $pendaftaran->nama_wali,
            $pendaftaran->pekerjaan_wali,
            $pendaftaran->penghasilan_wali,
            $pendaftaran->alamat_wali,
            $pendaftaran->skl_path
                ? '=HYPERLINK("dokumen/' . basename($pendaftaran->skl_path) . '", "Buka File SKL")'
                : 'Tidak Ada',
            $pendaftaran->kk_path
                ? '=HYPERLINK("dokumen/' . basename($pendaftaran->kk_path) . '", "Buka File KK")'
                : 'Tidak Ada',
            $pendaftaran->created_at ? $pendaftaran->created_at->format('d-m-Y H:i') : '',
            $pendaftaran->updated_at ? $pendaftaran->updated_at->format('d-m-Y H:i') : '',
        ];
    }
}
