<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryInformasi extends Model
{
    protected $fillable = ['information_id', 'image_path'];

    public function information()
    {
        return $this->belongsTo(Information::class, 'information_id');
    }
}
