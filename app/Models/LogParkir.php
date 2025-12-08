<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogParkir extends Model
{
    use HasFactory;

    protected $table = 'log_parkir';

    protected $fillable = [
        'id_kendaraan',
        'id_tempat',
        'waktu_masuk',
        'waktu_keluar',
        'status',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan');
    }

    public function tempat()
    {
        return $this->belongsTo(Tempat::class, 'id_tempat');
    }
}
