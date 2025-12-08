@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Tempat Parkir</h3>
        <a href="/tempat/create" class="btn btn-primary">+ Tambah Tempat</a>
    </div>

    @if (session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Tempat</th>
                <th>Kapasitas</th>
                <th>Terpakai</th>
                <th>Sisa</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tempat as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->nama }}</td>
                <td>{{ $t->kapasitas }}</td>

                <td>
                    {{ $t->terpakai ?? 0 }}
                </td>

                <td>
                    {{ $t->kapasitas - ($t->terpakai ?? 0) }}
                </td>

                <td>
                    <a href="/tempat/{{ $t->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                    <form action="/tempat/{{ $t->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin menghapus tempat ini?')" 
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
