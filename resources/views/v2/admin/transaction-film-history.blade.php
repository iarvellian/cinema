<h1>Daftar Transaksi Film</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<ul>
    @foreach ($transaksiFilms as $transaksiFilm)
        <li>
            {{ $transaksiFilm->transaksiFilm->user->nama }} - {{ $transaksiFilm->tiket->jadwal->film->judul }} - {{ $transaksiFilm->tiket->kursi->no_kursi }}{{ $transaksiFilm->tiket->kursi->baris }}
        </li>
    @endforeach
</ul>