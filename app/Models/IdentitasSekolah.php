<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentitasSekolah extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'identitas_sekolahs';
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
