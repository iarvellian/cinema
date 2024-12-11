<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\TransaksiFilmController;
use App\Http\Controllers\TransaksiMakananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', function () {
        return view('v2.admin.home-admin');
    })->name('admin.home-admin');

    Route::get('/admin-userlist', [UserController::class, 'showUser'])->name('admin.userlist');    
    Route::get('/admin-transaction-film', [UserController::class, 'showFilmTransaction'])->name('admin.transaction-film-history');
    Route::get('/admin-transaction-makanan', [UserController::class, 'showMakananTransaction'])->name('admin.transaction-makanan-history');

    Route::group(['prefix' => 'admin-films'], function () {
        Route::get('/', [FilmController::class, 'index'])->name('admin.film.index');
        Route::get('/create', [FilmController::class, 'create'])->name('admin.film.create');
        Route::post('/', [FilmController::class, 'store'])->name('admin.film.store');
        Route::get('/edit/{id}', [FilmController::class, 'edit'])->name('admin.film.edit');
        Route::put('/{id}', [FilmController::class, 'update'])->name('admin.film.update');
        Route::delete('/{id}', [FilmController::class, 'destroy'])->name('admin.film.destroy');
    });

    Route::group(['prefix' => 'admin-kursis'], function () {
        Route::get('/', [KursiController::class, 'index'])->name('admin.kursi.index');
        Route::get('/create', [KursiController::class, 'create'])->name('admin.kursi.create');
        Route::post('/', [KursiController::class, 'store'])->name('admin.kursi.store');
        Route::get('/edit/{id}', [KursiController::class, 'edit'])->name('admin.kursi.edit');
        Route::put('/{id}', [KursiController::class, 'update'])->name('admin.kursi.update');
        Route::delete('/{id}', [KursiController::class, 'destroy'])->name('admin.kursi.destroy');
    });

    Route::group(['prefix' => 'admin-jadwals'], function () {
        Route::get('/', [JadwalController::class, 'index'])->name('admin.jadwal.index');
        Route::get('/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
        Route::post('/', [JadwalController::class, 'store'])->name('admin.jadwal.store');
        Route::get('/edit/{id}', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
        Route::put('/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
        Route::delete('/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');
    });

    Route::group(['prefix' => 'admin-makanans'], function () {
        Route::get('/', [MakananController::class, 'index'])->name('admin.makanan.index');
        Route::get('/create', [MakananController::class, 'create'])->name('admin.makanan.create');
        Route::post('/', [MakananController::class, 'store'])->name('admin.makanan.store');
        Route::get('/edit/{id}', [MakananController::class, 'edit'])->name('admin.makanan.edit');
        Route::put('/{id}', [MakananController::class, 'update'])->name('admin.makanan.update');
        Route::delete('/{id}', [MakananController::class, 'destroy'])->name('admin.makanan.destroy');
    });
});

// User
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/home', function () {
        return view('v2.user.home-user');
    })->name('user.home-user');

    Route::get('/histori', [UserController::class, 'showTransactionByUser'])->name('user.histori');  

    Route::group(['prefix' => 'films'], function () {
        Route::get('/', [TransaksiFilmController::class, 'showFilms'])->name('user.film.daftar-film');
        Route::get('/{filmId}', [TransaksiFilmController::class, 'pilihFilm'])->name('user.film.pilih-film');
        Route::post('/{filmId}/pesan', [TransaksiFilmController::class, 'pesanTiket'])->name('user.film.pesan-tiket');
        Route::get('/{transaksiId}/bayar', [TransaksiFilmController::class, 'viewPembayaran'])->name('user.film.detail-transaksi');
        Route::post('/{transaksiId}/bayar', [TransaksiFilmController::class, 'bayarTiket'])->name('user.film.bayar');
    });

    Route::group(['prefix' => 'makanans'], function () {
        Route::get('/', [TransaksiMakananController::class, 'showMakanans'])->name('user.makanan.daftar-makanan');
        Route::post('/pilih', [TransaksiMakananController::class, 'pilihMakanan'])->name('user.makanan.pilih-makanan');
        Route::post('/pesan', [TransaksiMakananController::class, 'pesanMakanan'])->name('user.makanan.pesan-makanan');
        Route::get('/{transaksiMakananId}/bayar', [TransaksiMakananController::class, 'viewPembayaran'])->name('user.makanan.detail-transaksi');
        Route::post('/{transaksiMakananId}/bayar', [TransaksiMakananController::class, 'bayarMakanan'])->name('user.makanan.bayar');
    });
});

// Both
Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'profil'], function () {
        Route::get('/', [AuthController::class, 'showUpdateProfileForm'])->name('update-profile-form');
        Route::post('/', [AuthController::class, 'updateProfile'])->name('update-profile');
    });
});


// ROUTE ORIGINAL

// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Route::get('/register', function () {
//     return view('register');
// });
// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/home_admin', function () {
//     return view('home_admin');
// });

// Route::get('/profile', function () {
//     return view('profile');
// });

// Route::get('/makanan', function () {
//     return view('makanan');
// })->name('makanan');

// Route::get('/Login', function () {
//     return view('Login');
// })->name('Login');

// Route::get('/profileAdmin', function () {
//     return view('profileAdmin');
// });

// Route::get('/buytiket', function () {
//     return view('buytiket');
// });


// Route::get('/buytiket', function () {
//     return view('buytiket');
// })->name('buytiket');

// Route::get('/kursi', function () {
//     return view('kursi');
// })->name('kursi');

// Route::get('/home', function () {
//     return view('home');
// })->name('home');



// Route::get('/pembayaran', function () {
//     return view('pembayaran');
// })->name('pembayaran');

// Route::get('/pembayaranmkn', function () {
//     return view('pembayaranmkn');
// })->name('pembayaranmkn');