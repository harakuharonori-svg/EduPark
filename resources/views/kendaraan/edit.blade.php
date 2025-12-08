@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Edit Data Kendaraan</h3>

    @if(session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif

    <form action="/kendaraan/{{ $kendaraan->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Warga Sekolah</label>
            <select name="id_warsek" class="form-control" required>
                <option value="">-- Pilih Warga Sekolah --</option>
                @foreach($wargas as $w)
                    <option value="{{ $w->id }}" {{ $kendaraan->id_warsek == $w->id ? 'selected' : '' }}>
                        {{ $w->nama }} ({{ $w->jabatan }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Plat</label>
            <input type="text" name="nomor_plat" class="form-control" value="{{ $kendaraan->nomor_plat }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe Kendaraan</label>
            <select name="tipe" class="form-control" required>
                <option value="motor" {{ $kendaraan->tipe == 'motor' ? 'selected' : '' }}>Motor</option>
                <option value="mobil" {{ $kendaraan->tipe == 'mobil' ? 'selected' : '' }}>Mobil</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $kendaraan->brand }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Warna Kendaraan</label>
            <input type="text" name="warna" class="form-control" value="{{ $kendaraan->warna }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="/kendaraan" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection
