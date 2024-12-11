<h1>Daftar Makanan</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('user.makanan.pilih-makanan') }}" method="POST">
    @csrf
    <ul>
        @foreach ($makanans as $makanan)
            <li>
                <label>
                    <input type="checkbox" name="makanan_ids[]" value="{{ $makanan->id }}">
                    {{ $makanan->nama_makanan }} - Rp{{ number_format($makanan->harga, 0, ',', '.') }}
                </label>
            </li>
        @endforeach
    </ul>
    <button type="submit">Lanjutkan</button>
</form>