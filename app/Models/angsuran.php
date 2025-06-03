<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class angsuran extends Model
{
    protected $table = 'a_tahunans';

    protected $fillable = [
        'tahunan_id',
        'transaksi_id',
        'nama',
        'nominal',
    ];
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
    public function tahunan()
    {
        return $this->belongsTo(PTahunan::class, 'tahunan_id');
    }
}
