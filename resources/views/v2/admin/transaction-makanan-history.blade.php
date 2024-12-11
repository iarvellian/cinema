<h1>Daftar Transaksi Makanan</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<ul>
    @foreach ($transaksiMakanans as $transaksiMakanan)
        <li>
            {{ $transaksiMakanan->transaksiMakanan->user->nama }} - {{ $transaksiMakanan->makanan->nama_makanan }}
        </li>
    @endforeach
</ul>