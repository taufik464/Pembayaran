<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SAPRAS extends Model
{
    use HasFactory;
    protected $table = 'SAPRASS';

    protected $fillable = [
        'judul',
        'gambar',
    ];
}
