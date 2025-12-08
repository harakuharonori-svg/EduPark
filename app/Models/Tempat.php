<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    use HasFactory;

    protected $table = 'tempat';

    protected $fillable = ['nama','kapasitas'];

    public function logs()
    {
        return $this->hasMany(LogParkir::class, 'id_tempat');
    }
}
