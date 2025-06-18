@extends('layouts.app')

@section('content')
<div>
    <h3>Daftar pasien</h3>
    <a href="/pasien/create">Tambah pasien</a>

    {{-- Pesan sukses --}}
    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif

    {{-- Pesan error --}}
    @if(session('error'))
    <div>{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pasien as $pasiens)
            <tr>
                <td>{{ $pasiens['nama_pasien'] }}</td>
                <td>{{ $pasiens['kategori'] }}</td>
                <td>{{ $pasiens['stok'] }}</td>
                <td>{{ $pasiens['harga'] }}</td>
                <td>
                    <a href="/pasien/{{ $pasiens['id'] }}/edit">Edit</a>
                    <form action="/pasien/{{ $pasiens['id'] }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>Data pasien tidak tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection