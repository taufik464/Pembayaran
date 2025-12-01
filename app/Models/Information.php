<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'information';
    protected $fillable = ['category_id', 'title', 'content', 'image_path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleryInformasis()
    {
        return $this->hasMany(GalleryInformasi::class, 'information_id');
    }
}
