<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_ppdb extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'data_ppdb'; // Nama tabel sesuai konvensi Laravel
    protected $fillable = [
        'nama',
        'nik',
        'nisn',
        'jk',
        'tgl_lahir',
        'agama',
        'alamat',
        'no_hp',
        'asal_sekolah',
        'hobi',
        'bidang_studi',
        'olahraga',
        'cita_cita',
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'keterangan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'keterangan_ibu',
        'nama_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'alamat_wali',
        'skl_path',
        'kk_path',
    ];
}
