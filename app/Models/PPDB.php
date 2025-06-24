<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPDB extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'konten',
        'tanggal_mulai',
        'tanggal_selesai',
        'persyaratan',
        'biaya'
    ];

    protected $dates = ['tanggal_mulai', 'tanggal_selesai'];
}
