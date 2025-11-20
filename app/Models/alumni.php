<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alumni extends Model
{
    protected $table = 'alumnis';
    protected $fillable = [
        'nama',
        'tahun_lulus',
        'kuliah',
        'tempat_kuliah',
        'pekerjaan',
        'tempat_kerja',
        'pesan',
        'foto'
    ];
}
