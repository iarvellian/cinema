<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiFilm;
use App\Models\DetailTransaksiMakanan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function showUser()
    {
        $users = User::all();
        return view('v2.admin.userlist', compact('users'));
    }

    // Menampilkan daftar transaksi film
    public function showFilmTransaction()
    {
        $transaksiFilms = DetailTransaksiFilm::all();
        return view('v2.admin.transaction-film-history', compact('transaksiFilms'));
    }

    // Menampilkan daftar transaksi makanan
    public function showMakananTransaction()
    {
        $transaksiMakanans = DetailTransaksiMakanan::all();
        return view('v2.admin.transaction-makanan-history', compact('transaksiMakanans'));
    }

    // Menampilkan daftar transaksi film dan makanan berdasarkan user 
    public function showTransactionByUser()
    {
        $user = auth()->user();

        $userTransaksiFilms = $user->transaksiFilms()->with('detailTransaksiFilms')->get();
        $detailTransaksiFilms = $userTransaksiFilms->flatMap->detailTransaksiFilms;

        $userTransaksiMakanans = $user->transaksiFilms()->with('detailTransaksiFilms')->get();
        $detailTransaksiMakanans = $userTransaksiMakanans->flatMap->detailTransaksiMakanans;
        
        return view('v2.user.histori', compact('detailTransaksiFilms', 'detailTransaksiMakanans'));
    }
}
