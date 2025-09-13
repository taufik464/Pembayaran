<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;
    protected $table = 'profil_sekolahs';
    protected $fillable = ['judul', 'isi', 'image', 'kategori'];
}
