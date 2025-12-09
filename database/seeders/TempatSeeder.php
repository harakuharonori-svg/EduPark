<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempatSeeder extends Seeder
{
    public function run()
    {
        DB::table('tempat')->insert([
            [
                'nama' => 'Gerbang Depan',
                'kapasitas' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Gerbang Belakang',
                'kapasitas' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
