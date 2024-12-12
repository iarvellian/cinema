<h1>Tambah Jadwal Baru</h1>
<form action="{{ route('admin.jadwal.store') }}" method="POST">
    @csrf
    <label>Film</label>
    <select name="film_id" required>
        @foreach ($films as $film)
        <option value="{{ $film->id }}">{{ $film->judul }}</option>
        @endforeach
    </select>
    <br>
    <label>Tanggal Tayang</label>
    <input type="date" name="tgl_tayang" required>
    <br>
    <label>Jam Tayang</label>
    <input type="time" name="jam_tayang" required>
    <br>
    <label>Harga</label>
    <input type="number" name="harga" required>
    <br>
    <button type="submit">Simpan</button>
</form>
