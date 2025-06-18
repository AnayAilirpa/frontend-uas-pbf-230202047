<!-- @extends('layouts.app') -->

@section('content')
<div>
    <h3>Daftar obat</h3>
    <a href="/obat/create">Tambah obat</a>

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
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse($obat as $obats)
            <tr>
                <td>{{ $obats['nama_obat'] }}</td>
                <td>{{ $obats['kategori'] }}</td>
                <td>{{ $obats['stok'] }}</td>
                <td>{{ $obats['harga'] }}</td>
                <td>
                    <a href="/obat/{{ $obats['id'] }}/edit">Edit</a>
                    <form action="/obat/{{ $obats['id'] }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus data ini?')" >Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>Data obat tidak tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection