<h1>Edit Film</h1>
<form action="{{ route('admin.film.update', $film->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Judul</label>
    <input type="text" name="judul" value="{{ $film->judul }}" required>
    <br>
    <label>Deskripsi</label>
    <textarea name="deskripsi" required>{{ $film->deskripsi }}</textarea>
    <br>
    <label>Cuplikan URL</label>
    <input type="url" name="cuplikan_url" value="{{ $film->cuplikan_url }}">
    <br>
    <label>Tanggal Tayang</label>
    <input type="date" name="tgl_tayang" value="{{ $film->tgl_tayang }}" required>
    <br>
    <label>Status</label>
    <select name="status">
        <option value="Now Playing" {{ $film->status === 'Now Playing' ? 'selected' : '' }}>Now Playing</option>
        <option value="Coming Soon" {{ $film->status === 'Coming Soon' ? 'selected' : '' }}>Coming Soon</option>
    </select>
    <br>
    <button type="submit">Update</button>
</form>
