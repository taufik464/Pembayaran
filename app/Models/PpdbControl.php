<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PpdbControl extends Model
{
    use HasFactory;

    protected $table = 'ppdb_control';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
        'is_active'  => 'boolean',
    ];

    /**
     * Ambil PPDB yang sedang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now()->addSeconds(1))
            ->latest('start_date');
    }
}
