<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Log Parkir</title>
</head>
<body>
    <h1>Log Parkir</h1>

    @if(session('sukses'))
        <p style="color:green">{{ session('sukses') }}</p>
    @endif
    @if(session('eror'))
        <p style="color:red">{{ session('eror') }}</p>
    @endif

    <h2>Tambah Kendaraan Masuk</h2>
    <form action="{{ url('/log-parkir/masuk') }}" method="POST">
        @csrf

        <label>Kendaraan</label>
        <select name="id_kendaraan" required>
            <option value="">--Pilih Kendaraan--</option>
            @foreach($kendaraans as $k)
                <option value="{{ $k->id }}">
                    {{ $k->nomor_plat }} - {{ $k->wargaSekolah->nama ?? 'Tidak diketahui' }}
                </option>
            @endforeach
        </select>

        <label>Tempat</label>
        <select name="id_tempat" required>
            <option value="">--Pilih Tempat--</option>
            @foreach($tempats as $t)
                <option value="{{ $t->id }}">{{ $t->nama }} (Kapasitas: {{ $t->kapasitas }})</option>
            @endforeach
        </select>

        <button type="submit">Masuk</button>
    </form>

    <h2>Daftar Log Parkir</h2>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Plat</th>
                <th>Pemilik</th>
                <th>Tempat</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $index => $log)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $log->kendaraan->nomor_plat ?? '-' }}</td>
                    <td>{{ $log->kendaraan->wargaSekolah->nama ?? '-' }}</td>
                    <td>{{ $log->tempat->nama ?? '-' }}</td>
                    <td>{{ $log->waktu_masuk }}</td>
                    <td>{{ $log->waktu_keluar ?? '-' }}</td>
                    <td>{{ $log->status }}</td>
                    <td>
                        @if($log->status === 'didalam' || $log->status === 'inside')
                            <form action="{{ url('/log-parkir/keluar/'.$log->id_kendaraan) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" onclick="return confirm('Keluarkan kendaraan ini?')">Keluar</button>
                            </form>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">Belum ada log parkir</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
