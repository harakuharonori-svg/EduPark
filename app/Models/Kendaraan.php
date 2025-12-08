<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';

    protected $fillable = ['id_warsek','tipe','brand','nomor_plat','warna'];

    public function wargaSekolah()
    {
        return $this->belongsTo(\App\Models\WargaSekolah::class, 'id_warsek');
    }
}
