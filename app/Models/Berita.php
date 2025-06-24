<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita'; // Tambahkan ini

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'penulis',
        'tanggal_publish'
    ];
}
