<div class="container mt-5">
    <h1 class="mb-4">Pembayaran Tiket</h1>

    <!-- Success/Error Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Transaksi Detail -->
    @if($transaksi)
        <div class="card mb-4">
            <div class="card-header">
                <h5>Detail Transaksi</h5>
            </div>
            <div class="card-body">
                <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
                <p><strong>Tanggal Transaksi:</strong> {{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->format('d-m-Y') }}</p>
                <p><strong>Status:</strong> {{ ucfirst($transaksi->status) }}</p>
                <p><strong>Total Harga:</strong> Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Tiket Detail -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Detail Tiket</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Film</th>
                            <th>Jadwal</th>
                            <th>Kursi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi->detailTransaksiFilms as $detail)
                            <tr>
                                <td>{{ $detail->tiket->jadwal->film->judul }}</td>
                                <td>
                                    {{ $detail->tiket->jadwal->tgl_tayang }} 
                                    ({{ $detail->tiket->jadwal->jam_tayang }})
                                </td>
                                <td>{{ $detail->tiket->kursi->baris }}{{ $detail->tiket->kursi->no_kursi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="card">
            <div class="card-header">
                <h5>Pembayaran</h5>
            </div>
            <div class="card-body">
                <p>Silakan klik tombol di bawah untuk menyelesaikan pembayaran:</p>
                <form action="{{ route('user.film.bayar', $transaksi->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Bayar</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Transaksi tidak ditemukan.
        </div>
    @endif
</div>