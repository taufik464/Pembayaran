<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    public function JenisPembayaran()
    {
        return $this->hasMany(JenisPembayaran::class);
    }
}
