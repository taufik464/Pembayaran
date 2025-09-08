<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    use HasFactory;
    protected $table = 'profil_sekolahs'; // Nama tabel sesuai konvensi Laravel

    protected $fillable = [
        'sejarah',
        'visi',
        'misi',
        'tujuan',
        'sambutan_kepsek',
        'foto_kepsek'
    ];
}
