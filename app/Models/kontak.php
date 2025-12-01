<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'kontaks';

    protected $fillable = [
        'nama',
        'image',
        'link',
        'nomor',
    ];
}
