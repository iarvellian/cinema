<h1>Daftar Jadwal</h1>
<a href="{{ route('admin.jadwal.create') }}">Tambah Jadwal</a>
<ul>
    @foreach ($jadwals as $jadwal)
        <li>
            {{ $jadwal->film->judul }}
            <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}">Edit</a>
            <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>