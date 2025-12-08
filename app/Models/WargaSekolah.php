<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaSekolah extends Model
{
    use HasFactory;

    protected $table = 'warga_sekolah';

    protected $fillable = ['nama','jabatan','kelas'];

    public function kendaraans()
    {
        return $this->hasMany(\App\Models\Kendaraan::class, 'id_warsek');
    }
}
