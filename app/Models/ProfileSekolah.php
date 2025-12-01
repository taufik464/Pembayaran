<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'profil_sekolahs'; // Nama tabel sesuai konvensi Laravel

    protected $fillable = [
        'judul',
        'kategori',
        'isi',
        'image',
       
    ];
}
