<?php

namespace App\Http\Controllers;

use App\Models\LogParkir;
use App\Models\Tempat;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class LogParkirController extends Controller
{
    public function index()
    {
        $logs = \App\Models\LogParkir::with(['kendaraan.wargaSekolah', 'tempat'])
            ->orderBy('waktu_masuk', 'desc')
            ->get();

        // juga kirim data kendaraan & tempat untuk form "Masuk"
        $kendaraans = \App\Models\Kendaraan::with('wargaSekolah')->get();
        $tempats = \App\Models\Tempat::all();

        return view('log_parkir.index', compact('logs', 'kendaraans', 'tempats'));
    }



    public function masuk(Request $request)
    {
        $request->validate([
            'id_kendaraan' => 'required|exists:kendaraan,id',
            'id_tempat' => 'required|exists:tempat,id',
        ]);

        $tempat = Tempat::findOrFail($request->id_tempat);
        $jumlahSaatIni = LogParkir::where('id_tempat', $tempat->id)->where('status', 'didalam')->count();
        if ($jumlahSaatIni >= $tempat->kapasitas) {
            return redirect()->back()->with('eror', 'Tempat parkir sudah penuh!');
        }

        LogParkir::create([
            'id_kendaraan' => $request->id_kendaraan,
            'id_tempat' => $request->id_tempat,
            'waktu_masuk' => now(),
            'status' => 'didalam',
        ]);

        return redirect()->back()->with('sukses', 'Kendaraan berhasil masuk!');
    }

    public function keluar($id)
    {
        $log = LogParkir::where('id_kendaraan', $id)->where('status', 'didalam')->firstOrFail();
        $log->update([
            'waktu_keluar' => now(),
            'status' => 'diluar',
        ]);

        return redirect()->back()->with('sukses', 'Kendaraan berhasil keluar!');
    }
}
