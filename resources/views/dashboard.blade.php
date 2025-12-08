@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Dashboard Parkir Sekolah</h2>

    <div class="row">

        {{-- Total Kendaraan --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Total Kendaraan</h5>
                    <h3>{{ $totalKendaraan }}</h3>
                </div>
            </div>
        </div>

        {{-- Total Warga Sekolah --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Total Warga Sekolah</h5>
                    <h3>{{ $totalWarga }}</h3>
                </div>
            </div>
        </div>

        {{-- Kendaraan Sedang Parkir --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Kendaraan di Dalam</h5>
                    <h3>{{ $kendaraanDiDalam }}</h3>
                </div>
            </div>
        </div>

        {{-- Total Tempat Parkir --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Tempat Parkir</h5>
                    <h3>{{ $totalTempat }}</h3>
                </div>
            </div>
        </div>
    </div>


    {{-- Detail Kapasitas Tempat --}}
    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <h4 class="mb-3">Status Tempat Parkir</h4>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tempat</th>
                        <th>Kapasitas</th>
                        <th>Terisi</th>
                        <th>Sisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tempat as $t)
                        <tr>
                            <td>{{ $t->nama }}</td>
                            <td>{{ $t->kapasitas }}</td>
                            <td>{{ $t->terisi }}</td>
                            <td>{{ $t->kapasitas - $t->terisi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
