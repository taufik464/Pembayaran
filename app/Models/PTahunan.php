<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PTahunan extends Model
{
    protected $table = 'p_tahunans';

    protected $fillable = [
        'jenis_pembayaran_id',
        'kelas_id',
        'harga',
    ];

    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
