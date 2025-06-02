<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
   

    protected $fillable = [
        'user_id',
        'metode_bayar_id',
        'tanggal',
        'uang_bayar',
        'tanggal_bayar',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function metodeBayar()
    {
        return $this->belongsTo(MetodeBayar::class, 'metode_bayar_id');
    }
    public function aTahunan()
    {
        return $this->hasMany(ATahunan::class, 'transaksi_id');
    }
    public function pembayaranLain()
    {
        return $this->hasMany(PembayaranLain::class, 'transaksi_id');
    }

}
