@extends('layouts.app')

@section('content')
<div class="container mt-4">
    
    <h3>Tambah Tempat Parkir</h3>

    <form action="/tempat" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Tempat</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" min="1" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="/tempat" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection
