<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    protected $table = 'kontaks';

    protected $fillable = [
        'nama',
        'image',
        'link',
        'nomor',
    ];
}
