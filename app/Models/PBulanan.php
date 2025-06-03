<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PBulanan extends Model
{
    protected $table = 'p_bulanan';
    protected $appends = ['status', 'nama_bulan'];

    protected $fillable = [
        'jenis_pembayaran_id',
        'siswa_id',
        'bulan',
        'transaksi_id',
        'harga',
    ];


    public function getStatusAttribute()
    {
        return $this->transaksi_id === null ? 'Belum Lunas' : 'Lunas';
    }

    public function getNamaBulanAttribute()
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return $bulan[$this->bulan] ?? 'Bulan tidak valid';
    }

    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class, 'jenis_pembayaran_id');
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
