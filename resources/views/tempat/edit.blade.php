@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Edit Tempat Parkir</h2>

    @if(session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif

    <form action="{{ url('/tempat/' . $tempat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Tempat</label>
            <input type="text" name="nama" class="form-control" value="{{ $tempat->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" min="0" value="{{ $tempat->kapasitas }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ url('/tempat') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
