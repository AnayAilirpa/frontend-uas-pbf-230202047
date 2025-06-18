
<div class="mb-3">
    <label class="form-label">Nama Obat</label>
    <input type="text" name="nama_obat" value="{{ old('nama_obat', $obat['nama_obat'] ?? '') }}" class="form-control" required {{ isset($obat) ? '' : '' }}>
</div>

<div class="mb-3">
    <label class="form-label">Kategori</label>
    <input type="text" name="kategori" value="{{ old('kategori', $obat['kategori'] ?? '') }}" class="form-control" required {{ isset($obat) ? '' : '' }}>
</div>

<div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="text" name="stok" value="{{ old('stok', $obat['stok'] ?? '') }}" class="form-control" required {{ isset($obat) ? '' : '' }}>
</div>

<div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="text" name="harga" value="{{ old('harga', $obat['harga'] ?? '') }}" class="form-control" required {{ isset($obat) ? '' : '' }}>
</div>
