<h1>Pesan Makan</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('user.makanan.pesan-makanan') }}" method="POST">
    @csrf
    <ul>
        @foreach ($makanans as $makanan)
            <li>
                <label>
                    {{ $makanan->nama_makanan }} - Rp{{ number_format($makanan->harga, 0, ',', '.') }}
                </label>
                <input type="number" name="jumlah[{{ $makanan->id }}]" min="1" value="1">
            </li>
        @endforeach
    </ul>
    <button type="submit">Pesan</button>
</form>
