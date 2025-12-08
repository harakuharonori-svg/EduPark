<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\WargaSekolah;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::with('wargaSekolah')->get();
        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        $warga = WargaSekolah::all();
        return view('kendaraan.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_warsek' => 'required|exists:warga_sekolah,id',
            'tipe' => 'required|in:motor,mobil',
            'nomor_plat' => 'required|unique:kendaraan,nomor_plat',
        ]);

        Kendaraan::create([
            'id_warsek' => $request->id_warsek,
            'tipe' => $request->tipe,
            'brand' => $request->brand,
            'nomor_plat' => $request->nomor_plat,
            'warna' => $request->warna,
        ]);

        return redirect('/kendaraan')->with('sukses', 'Kendaraan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $wargas = WargaSekolah::all();
        return view('kendaraan.edit', compact('kendaraan', 'wargas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_warsek' => 'required|exists:warga_sekolah,id',
            'nomor_plat' => 'required|unique:kendaraan,nomor_plat,'.$id,
            'tipe' => 'required|in:motor,mobil',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update($request->only(['id_warsek','tipe','brand','nomor_plat','warna']));

        return redirect('/kendaraan')->with('sukses', 'Data kendaraan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();
        return redirect('/kendaraan')->with('sukses', 'Kendaraan berhasil dihapus!');
    }
}
