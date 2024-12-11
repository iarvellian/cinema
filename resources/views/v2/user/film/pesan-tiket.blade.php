<h1>Pesan Tiket</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('user.film.pesan-tiket', $film->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="jadwal_id" class="form-label">Jadwal</label>
        <select name="jadwal_id" id="jadwal_id" class="form-control" required>
            @foreach($jadwals as $jadwal)
                <option value="{{ $jadwal->id }}">{{ $jadwal->film->judul }} || {{ $jadwal->tgl_tayang }} || {{ $jadwal->jam_tayang }} (Rp{{ number_format($jadwal->harga) }})</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="kursi_ids" class="form-label">Pilih Kursi</label>
        <select name="kursi_ids[]" id="kursi_ids" class="form-control" multiple required>
            @foreach($kursis as $kursi)
                <option value="{{ $kursi->id }}">{{ $kursi->baris }}{{ $kursi->no_kursi }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Pesan Tiket</button>
</form>