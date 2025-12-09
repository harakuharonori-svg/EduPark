@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Log Parkir</h2>

        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary shadow-sm">
            ← Kembali ke Kendaraan
        </a>
    </div>

    {{-- Alert --}}
    @if(session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif
    @if(session('eror'))
        <div class="alert alert-danger">{{ session('eror') }}</div>
    @endif

    {{-- Form Kendaraan Masuk --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            Tambah Kendaraan Masuk
        </div>
        <div class="card-body">

            <form action="{{ url('/log-parkir/masuk') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label class="form-label fw-semibold">Kendaraan</label>
                        <select name="id_kendaraan" class="form-select" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach($kendaraans as $k)
                                <option value="{{ $k->id }}">
                                    {{ $k->nomor_plat }} - {{ $k->wargaSekolah->nama ?? 'Tidak diketahui' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label class="form-label fw-semibold">Tempat Parkir</label>
                        <select name="id_tempat" class="form-select" required>
                            <option value="">-- Pilih Tempat --</option>
                            @foreach($tempats as $t)
                                <option value="{{ $t->id }}">
                                    {{ $t->nama }} (Kapasitas: {{ $t->kapasitas }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            + Masuk
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    {{-- Tabel Log Parkir --}}
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white fw-bold">
            Daftar Log Parkir
        </div>

        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nomor Plat</th>
                        <th>Pemilik</th>
                        <th>Tempat</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Status</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($logs as $index => $log)
                        <tr class="align-middle text-center">
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-bold">{{ $log->kendaraan->nomor_plat ?? '-' }}</td>
                            <td>{{ $log->kendaraan->wargaSekolah->nama ?? '-' }}</td>
                            <td>{{ $log->tempat->nama ?? '-' }}</td>
                            <td>{{ $log->waktu_masuk }}</td>
                            <td>{{ $log->waktu_keluar ?? '-' }}</td>

                            <td>
                                @if($log->status === 'didalam' || $log->status === 'inside')
                                    <span class="badge bg-success">Di Dalam</span>
                                @else
                                    <span class="badge bg-secondary">Keluar</span>
                                @endif
                            </td>

                            <td>
                                @if($log->status === 'didalam' || $log->status === 'inside')
                                    <form action="{{ url('/log-parkir/keluar/' . $log->id_kendaraan) }}"
                                          method="POST"
                                          onsubmit="return confirm('Keluarkan kendaraan ini?')">
                                        @csrf

                                        <button class="btn btn-danger btn-sm w-100">
                                            Keluar
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <em>Belum ada log parkir...</em>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
