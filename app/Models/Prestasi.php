<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';
    protected $fillable = [
        'judul',
        'deskripsi',
        'tingkat',
        'tahun',
        'jenis', // 'sekolah' atau 'siswa'
        'gambar'
    ];
}
