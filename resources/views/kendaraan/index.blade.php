@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Data Kendaraan</h2>

        <div>
            <!-- Tombol menuju Log Parkir -->
            <a href="{{ url('/log-parkir') }}" class="btn btn-secondary shadow-sm me-2">
                📄 Log Parkir
            </a>

            <a href="{{ route('kendaraan.create') }}" class="btn btn-primary shadow-sm">
                + Tambah Kendaraan
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nomor Plat</th>
                        <th>Tipe</th>
                        <th>Brand</th>
                        <th>Warna</th>
                        <th>Warga Sekolah</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kendaraans as $k)
                        <tr class="align-middle">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-bold">{{ $k->nomor_plat }}</td>
                            <td class="text-capitalize">{{ $k->tipe }}</td>
                            <td>{{ $k->brand }}</td>
                            <td>{{ $k->warna }}</td>
                            <td>{{ $k->wargaSekolah->nama ?? 'Tidak diketahui' }}</td>

                            <td class="text-center">
                                <a href="{{ route('kendaraan.edit', $k->id) }}"
                                   class="btn btn-warning btn-sm me-1">
                                    Edit
                                </a>

                                <form action="{{ route('kendaraan.destroy', $k->id) }}"
                                      method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Hapus kendaraan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <em>Belum ada data kendaraan...</em>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
