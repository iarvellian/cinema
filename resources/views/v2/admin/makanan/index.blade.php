<h1>Daftar Makanan</h1>
<a href="{{ route('admin.makanan.create') }}">Tambah Makanan</a>
<ul>
    @foreach ($makanans as $makanan)
        <li>
            {{ $makanan->nama_makanan }}
            <a href="{{ route('admin.makanan.edit', $makanan->id) }}">Edit</a>
            <form action="{{ route('admin.makanan.destroy', $makanan->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus makanan ini?')">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>