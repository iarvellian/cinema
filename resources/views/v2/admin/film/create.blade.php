<h1>Tambah Film Baru</h1>
<form action="{{ route('admin.film.store') }}" method="POST">
    @csrf
    <label>Judul</label>
    <input type="text" name="judul" required>
    @if ($errors->has('judul'))
        <span>{{ $errors->first('judul') }}</span>
        @endif
    <br>
    <label>Deskripsi</label>
    <textarea name="deskripsi" required></textarea>
    @if ($errors->has('deskripsi'))
        <span>{{ $errors->first('deskripsi') }}</span>
        @endif
    <br>
    <label>Cuplikan URL</label>
    <input type="url" name="cuplikan_url">
    @if ($errors->has('cuplikan_url'))
        <span>{{ $errors->first('cuplikan_url') }}</span>
        @endif
    <br>
    <label>Tanggal Tayang</label>
    <input type="date" name="tgl_tayang" required>
    @if ($errors->has('tgl_tayang'))
        <span>{{ $errors->first('tgl_tayang') }}</span>
        @endif
    <br>
    <label>Status</label>
    <select name="status">
        <option value="Now Playing">Now Playing</option>
        <option value="Coming Soon">Coming Soon</option>
    </select>
    @if ($errors->has('status'))
        <span>{{ $errors->first('status') }}</span>
        @endif
    <br>
    <button type="submit">Simpan</button>
</form>
