<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    protected $table = 'periodes';
    protected $appends = ['tahun'];

    protected $fillable = [
        'tahun_awal',
        'tahun_akhir'
    ];


    public function getTahunAttribute()
    {
        return $this->tahun_awal . ' - ' . $this->tahun_akhir;
    }
    public function JenisPembayaran()
    {
        return $this->hasMany(JenisPembayaran::class);
    }
}
