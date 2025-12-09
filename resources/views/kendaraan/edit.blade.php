@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="mb-4">Edit Data Kendaraan</h3>

            @if(session('sukses'))
                <div class="alert alert-success">
                    {{ session('sukses') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/kendaraan/{{ $kendaraan->id }}" method="POST" class="mt-3">
                @csrf
                @method('PUT')

                {{-- Pemilik --}}
                <div class="mb-3">
                    <label class="form-label">Pemilik Kendaraan (Warga Sekolah)</label>
                    <select name="id_warsek" class="form-select" required>
                        <option value="">-- Pilih Pemilik --</option>
                        @foreach($wargas as $w)
                            <option value="{{ $w->id }}"
                                {{ $kendaraan->id_warsek == $w->id ? 'selected' : '' }}>
                                {{ $w->nama }} ({{ $w->kelas ?? $w->jabatan }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tipe & Brand --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tipe Kendaraan</label>
                        <select name="tipe" class="form-select" required>
                            <option value="motor" {{ $kendaraan->tipe == 'motor' ? 'selected' : '' }}>Motor</option>
                            <option value="mobil" {{ $kendaraan->tipe == 'mobil' ? 'selected' : '' }}>Mobil</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control"
                               value="{{ $kendaraan->brand }}" required>
                    </div>
                </div>

                {{-- Plat & Warna --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor Plat</label>
                        <input type="text" name="nomor_plat" class="form-control"
                               value="{{ $kendaraan->nomor_plat }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Warna Kendaraan</label>
                        <input type="text" name="warna" class="form-control"
                               value="{{ $kendaraan->warna }}" required>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="/kendaraan" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success px-4">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
