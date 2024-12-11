<h1>Tambah Kursi Baru</h1>
<form action="{{ route('admin.kursi.store') }}" method="POST">
    @csrf
    <label>Nomor Kursi</label>
    <input type="number" name="no_kursi" required>
    <br>
    <label>Baris</label>
    <input type="text" name="baris" required>
    <br>
    <button type="submit">Simpan</button>
</form>
