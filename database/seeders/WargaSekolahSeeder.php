<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSekolahSeeder extends Seeder
{
    public function run()
    {
        DB::table('warga_sekolah')->insert([
            [
                'nama' => 'Adoy',
                'kelas' => 'X RPL-1',
                'jabatan' => 'murid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ki Sugeng',
                'kelas' => null,
                'jabatan' => 'guru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ki Alvin',
                'kelas' => null,
                'jabatan' => 'tenaga pendidik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
