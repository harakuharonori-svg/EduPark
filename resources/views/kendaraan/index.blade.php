@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Kendaraan</h2>

    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary mb-3">
        Tambah Kendaraan
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Plat</th>
                <th>Tipe</th>
                <th>Brand</th>
                <th>Warna</th>
                <th>Warga Sekolah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraans as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nomor_plat }}</td>
                    <td>{{ $k->tipe }}</td>
                    <td>{{ $k->brand }}</td>
                    <td>{{ $k->warna }}</td>
                    <td>{{ $k->wargaSekolah->nama ?? 'Tidak diketahui' }}</td>

                    <td>
                        <a href="{{ route('kendaraan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('kendaraan.destroy', $k->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach


            @if ($kendaraans->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Belum ada data kendaraan</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
