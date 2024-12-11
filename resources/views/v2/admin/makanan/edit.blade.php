<h1>Edit Makanan</h1>
<form action="{{ route('admin.makanan.update', $makanan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Makanan</label>
    <input type="text" name="nama_makanan" value="{{ $makanan->nama_makanan }}" required>
    <br>
    <label>Deskripsi</label>
    <textarea name="deskripsi" required>{{ $makanan->deskripsi }}</textarea>
    <br>
    <label>Harga</label>
    <input type="number" name="harga" step="0.01" value="{{ $makanan->harga }}" required>
    <br>
    <label>Gambar URL</label>
    <input type="url" name="gambar_url" value="{{ $makanan->gambar_url }}">
    <br>
    <button type="submit">Update</button>
</form>
