<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\WargaSekolah;
use App\Models\LogParkir;
use App\Models\Tempat;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalKendaraan' => Kendaraan::count(),
            'totalWarga' => WargaSekolah::count(),
            'kendaraanDiDalam' => LogParkir::where('status', 'didalam')->count(),
            'totalTempat' => Tempat::count(),
            'tempat' => Tempat::withCount([
                'log as terisi' => function($q){
                    $q->where('status', 'didalam');
                }
            ])->get()
        ]);
    }
}
