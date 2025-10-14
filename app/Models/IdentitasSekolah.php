<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentitasSekolah extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'alamat',
        'telepon',
        'email',
        'website',
        'logo',
        'jam_operasi',
    ];
}
