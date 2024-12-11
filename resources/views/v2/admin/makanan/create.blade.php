<h1>Tambah Makanan Baru</h1>
<form action="{{ route('admin.makanan.store') }}" method="POST">
    @csrf
    <label>Nama Makanan</label>
    <input type="text" name="nama_makanan" required>
    <br>
    <label>Deskripsi</label>
    <textarea name="deskripsi" required></textarea>
    <br>
    <label>Harga</label>
    <input type="number" name="harga" step="0.01" required>
    <br>
    <label>Gambar URL</label>
    <input type="url" name="gambar_url">
    <br>
    <button type="submit">Simpan</button>
</form>
