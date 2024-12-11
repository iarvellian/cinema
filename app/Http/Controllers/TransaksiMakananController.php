<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiMakanan;
use App\Models\Makanan;
use App\Models\TransaksiFilm;
use App\Models\TransaksiMakanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransaksiMakananController extends Controller
{
    // Menampilkan view untuk menampilkan daftar makanan
    public function showMakanans()
    {
        // Cek apakah user memiliki transaksi film yang valid
        $hasValidTransaction = TransaksiFilm::with('detailTransaksiFilms.tiket.jadwal')
            ->where('user_id', auth()->id())
            ->where('status', 'paid')
            ->whereHas('detailTransaksiFilms.tiket.jadwal', function ($query) {
                $query->whereDate('tgl_tayang', '>=', now());
            })
            ->exists();

        // Jika tidak ada transaksi film valid
        if (!$hasValidTransaction) {
            return redirect()->back()->with('error', 'Anda belum memiliki transaksi film dengan jadwal yang valid.');
        }

        // Ambil daftar makanan jika user memiliki transaksi film valid
        $makanans = Makanan::all();

        return view('v2.user.makanan.daftar-makanan', compact('makanans'));
    }

    // Function pilih film
    public function pilihMakanan(Request $request)
    {
        Log::info('Method called:', ['method' => $request->method(), 'url' => $request->fullUrl()]);
        $makananIds = $request->input('makanan_ids', []); // Ambil makanan yang dipilih
        if (empty($makananIds)) {
            return redirect()->route('user.makanan.daftar-makanan')->with('error', 'Silakan pilih minimal satu makanan.');
        }

        // Ambil makanan yang dipilih berdasarkan ID
        $makanans = Makanan::whereIn('id', $makananIds)->get();

        return view('v2.user.makanan.pesan-makanan', compact('makanans'));
    }

    // Function pesan makan
    public function pesanMakanan(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwals,id',
            'makanan_ids' => 'required|array',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        $jadwalId = $request->jadwal_id;
        $userId = auth()->id();
        $makananIds = $request->makanan_ids;
        $jumlah = $request->jumlah;

        DB::beginTransaction();
        try {
            // Hitung total harga berdasarkan jumlah makanan
            $totalHarga = collect($makananIds)->sum(function ($id, $index) use ($jumlah) {
                $makanan = Makanan::find($id);
                return $makanan->harga * $jumlah[$index];
            });

            // Buat transaksi makanan
            $transaksiMakanan = TransaksiMakanan::create([
                'user_id' => $userId,
                'total_harga' => $totalHarga,
                'status' => 'unpaid',
                'tgl_transaksi' => now(),
            ]);

            // Buat detail transaksi makanan
            foreach ($makananIds as $index => $id) {
                DetailTransaksiMakanan::create([
                    'transaksi_makanan_id' => $transaksiMakanan->id,
                    'makanan_id' => $id,
                    'jumlah' => $jumlah[$index],
                ]);
            }

            DB::commit();
            return redirect()->route('user.makanan.pembayaran', $transaksiMakanan->id)->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pesanan.');
        }
    }

    public function viewPembayaran($transaksiMakananId)
    {
        $transaksi = TransaksiMakanan::with('detailTransaksiMakanans.makanan')
        ->where('id', $transaksiMakananId)
        ->where('user_id', auth()->id())
        ->where('status', 'unpaid')
        ->first();

        if (!$transaksi) {
            return redirect()->route('user.makanan.daftar-makanan')->with('error', 'Transaksi makanan tidak valid.');
        }

        return view('v2.user.makanan.bayar', compact('transaksi'));
    }

    // Function bayar makan
    public function bayarMakanan($transaksiMakananId)
    {
        $transaksi = TransaksiMakanan::find($transaksiMakananId);

        if (!$transaksi || $transaksi->status !== 'unpaid') {
            return redirect()->back()->with('error', 'Transaksi makanan tidak valid.');
        }

        // Update status transaksi menjadi paid
        $transaksi->update(['status' => 'paid']);

        return redirect()->route('user.makanan.daftar-makanan')->with('success', 'Pembayaran makanan berhasil!');
    }
}
