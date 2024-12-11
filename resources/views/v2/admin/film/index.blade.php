<h1>Daftar Film</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<a href="{{ route('admin.film.create') }}">Tambah Film</a>
<ul>
    @foreach ($films as $film)
        <li>
            {{ $film->judul }}
            <a href="{{ route('admin.film.edit', $film->id) }}">Edit</a>
            <form action="{{ route('admin.film.destroy', $film->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus film ini?')">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>