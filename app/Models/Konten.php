<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table = 'kontens';
    protected $fillable = ['judul', 'isi', 'gambar', 'kategori_id'];
}
