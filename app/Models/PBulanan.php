<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PBulanan extends Model
{
    protected $table = 'p_bulanan';

    protected $fillable = [
        'jenis_pembayaran_id',
        'siswa_id',
        'bulan_id',
        'transaksi_id',
        'status',
        'harga',
    ];

    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class, 'jenis_pembayaran_id');
    }


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function bulan()
    {
        return $this->belongsTo(Bulan::class, 'bulan_id');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
}
