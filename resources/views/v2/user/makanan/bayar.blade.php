@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <h1>Detail Transaksi Makanan</h1>
    <p>Transaksi ID: {{ $transaksi->id }}</p>
    <p>Total Harga: Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
    <p>Status: {{ ucfirst($transaksi->status) }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Makanan</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi->detailTransaksiMakanans as $detail)
            <tr>
                <td>{{ $detail->makanan->nama_makanan }}</td>
                <td>{{ $detail->jumlah_makanan }}</td>
                <td>Rp {{ number_format($detail->makanan->harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($detail->jumlah_makanan * $detail->makanan->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('user.makanan.bayar', $transaksi->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Bayar</button>
    </form>
</div>
