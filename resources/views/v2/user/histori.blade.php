<h1>Daftar Transaksi</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<ul>
    @foreach ($detailTransaksiFilms as $transaksiFilm)
        <li>
            {{ $transaksiFilm->tiket->jadwal->film->judul }} - {{ $transaksiFilm->tiket->jadwal->tgl_tayang }} - {{ $transaksiFilm->transaksiFilm->status}}
        </li>
    @endforeach
</ul>

<ul>
    @foreach ($detailTransaksiMakanans as $transaksiMakanan)
        <li>
            {{ $transaksiMakanan->makanan->nama_makanan }}
        </li>
    @endforeach
</ul>