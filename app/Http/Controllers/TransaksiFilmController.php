<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiFilm;
use App\Models\Film;
use App\Models\Jadwal;
use App\Models\Kursi;
use App\Models\Tiket;
use App\Models\TransaksiFilm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransaksiFilmController extends Controller
{
    // Menampilkan view untuk menampilkan daftar film
    public function showFilms()
    {
        $films = Film::all();
        return view('v2.user.film.daftar-film', compact('films'));
    }

    // Function pilih film
    public function pilihFilm($filmId)
    {
        $film = Film::find($filmId);
        if (!$film) {
            return redirect()->route('user.film.daftar-film')->with('error', 'Film tidak ditemukan.');
        }

        $jadwals = Jadwal::where('film_id', $filmId)->get();
        $kursis = Kursi::all();

        return view('v2.user.film.pesan-tiket', compact('jadwals', 'kursis', 'film'));
    }

    // Function pesan tiket
    public function pesanTiket(Request $request, $filmId)
    {
        $userId = auth()->id();
        $jadwalId = $request->jadwal_id;
        $kursiIds = $request->kursi_ids; // Array kursi yang dipilih

        // Validasi film ID
        $film = Film::find($filmId);
        if (!$film) {
            return redirect()->route('user.film.daftar-film')->with('error', 'Film tidak ditemukan.');
        }

        // Ambil data jadwal untuk mendapatkan harga tiket
        $jadwal = Jadwal::find($jadwalId);
        if (!$jadwal) {
            return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');
        }

        $totalHarga = $jadwal->harga * count($kursiIds);

        // Mulai transaksi database untuk menjaga konsistensi data
        DB::beginTransaction();

        try {
            $transaksi = TransaksiFilm::create([
                'user_id' => $userId,
                'total_harga' => $totalHarga,
                'tgl_transaksi' => now(),
                'status' => 'unpaid',
            ]);

            foreach ($kursiIds as $kursiId) {
                // Cek apakah kursi sudah ada pada tabel tiket
                $tiket = Tiket::where('jadwal_id', $jadwalId)
                    ->where('kursi_id', $kursiId)
                    ->first();

                // Jika tiket sudah ada dan statusnya booked, return error
                if ($tiket && $tiket->status === 'booked') {
                    return redirect()->back()->with('error', "Kursi dengan ID {$kursiId} sudah dipesan.");
                }

                // Jika tiket belum ada, buat tiket baru
                $tiket = Tiket::create([
                    'jadwal_id' => $jadwalId,
                    'kursi_id' => $kursiId,
                    'status' => 'booked',
                ]);

                // Simpan detail transaksi
                DetailTransaksiFilm::create([
                    'transaksi_film_id' => $transaksi->id,
                    'tiket_id' => $tiket->id,
                ]);
            }

            // Commit transaksi database
            DB::commit();
            return redirect()->route('user.film.detail-transaksi', ['filmId' => $filmId, 'transaksiId' => $transaksi->id])
                ->with('success', 'Tiket berhasil dipesan!');
        } catch (\Exception $e) {
            // Rollback jika terjadi kesalahan
            DB::rollBack();

            // Log error untuk pengembangan
            Log::error('Error saat memesan tiket: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memesan tiket: ' . $e->getMessage());
        }
    }

    // Menampilkan halaman pembayaran
    public function viewPembayaran($transaksiId)
    {
        // Debugging
        logger("Transaksi ID: $transaksiId");

        $transaksi = TransaksiFilm::with('detailTransaksiFilms.tiket.kursi')->find($transaksiId);

        if (!$transaksi) {
            logger("Transaksi tidak ditemukan untuk ID: $transaksiId");
            return redirect()->route('user.film.daftar-film')->with('error', 'Transaksi tidak ditemukan.');
        }

        logger("Transaksi ditemukan: ", $transaksi->toArray());

        $film = Film::whereHas('jadwals', function ($query) use ($transaksi) {
            $query->whereIn('id', $transaksi->detailTransaksiFilms->pluck('tiket.jadwal_id'));
        })->first();

        if (!$film) {
            logger("Film tidak ditemukan untuk transaksi: ", $transaksi->toArray());
            return redirect()->route('user.film.daftar-film')->with('error', 'Film terkait tidak ditemukan.');
        }

        return view('v2.user.film.bayar', compact('transaksi'));
    }

    // Function bayar tiket
    public function bayarTiket($transaksiId)
    {
        $transaksi = TransaksiFilm::find($transaksiId);

        if (!$transaksi || $transaksi->status !== 'unpaid') {
            return redirect()->back()->with('error', 'Transaksi tidak valid.');
        }

        // Update status transaksi menjadi paid
        $transaksi->update(['status' => 'paid']);

        return redirect()->route('user.film.daftar-film')->with('success', 'Pembayaran berhasil!');
    }
}