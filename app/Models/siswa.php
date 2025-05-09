<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nama',
        'nis',
        'kelas_id',
        'user_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
