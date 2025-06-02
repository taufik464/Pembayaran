<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PTahunan extends Model
{
    protected $table = 'p_tahunans';

    protected $fillable = [
        'jenis_pembayaran_id',
        'siswa_id',
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
        return $this->belongsTo(Siswa::class, 'siswa_id', 'nis');
    }
}
