<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'tahun_pembuatan',
        'status',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
