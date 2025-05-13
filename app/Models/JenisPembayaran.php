<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    public function periode()
    {
        return $this->belongsTo(periode::class);
    }
}
