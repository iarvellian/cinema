<h1>Edit Kursi</h1>
<form action="{{ route('admin.kursi.update', $kursi->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nomor Kursi</label>
    <input type="number" name="no_kursi" value="{{ $kursi->no_kursi }}" required>
    <br>
    <label>Baris</label>
    <input type="text" name="baris" value="{{ $kursi->baris }}" required>
    <br>
    <button type="submit">Update</button>
</form>
