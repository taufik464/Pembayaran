<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PTambahan extends Model
{
    protected $table = 'p_tambahan';
    protected $fillable = [
        'pembayaran_lain_id',
        'siswa_id',
        'transaksi_id',
        'keterangan',
        'harga',
    ];

    public function jenisPembayaran()
    {
        return $this->belongsTo(PembayaranLain::class, 'pembayaran_lain_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'nis');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
}
