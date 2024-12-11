<h1>Daftar Film</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<ul>
    @foreach ($films as $film)
        <li>
            {{ $film->judul }}
            <a href="{{ route('user.film.pilih-film', $film->id) }}">Pilih</a>
        </li>
    @endforeach
</ul>