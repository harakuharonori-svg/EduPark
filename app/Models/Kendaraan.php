<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe',
        'nomor_plat',
        'brand',
        'warna'
    ];

    public function logParkir()
    {
        return $this->hasMany(LogParkir::class);
    }
}
