<h1>Edit Jadwal</h1>
<form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Film</label>
    <select name="film_id" required>
        @foreach ($films as $film)
        <option value="{{ $film->id }}" {{ $jadwal->film_id == $film->id ? 'selected' : '' }}>
            {{ $film->judul }}
        </option>
        @endforeach
    </select>
    <br>
    <label>Tanggal Tayang</label>
    <input type="date" name="tgl_tayang" value="{{ $jadwal->tgl_tayang }}" required>
    <br>
    <label>Jam Tayang</label>
    <input type="time" name="jam_tayang" value="{{ $jadwal->jam_tayang }}" required>
    <br>
    <button type="submit">Update</button>
</form>
