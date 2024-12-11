<h1>Daftar Kursi</h1>
<a href="{{ route('admin.kursi.create') }}">Tambah Kursi</a>
<ul>
    @foreach ($kursis as $kursi)
        <li>
        {{ $kursi->baris }}{{ $kursi->no_kursi }}
            <a href="{{ route('admin.kursi.edit', $kursi->id) }}">Edit</a>
            <form action="{{ route('admin.kursi.destroy', $kursi->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus kursi ini?')">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>