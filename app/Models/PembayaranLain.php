<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranLain extends Model
{
    protected $table = 'pembayaran_lain';
    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
    ];

   
}
