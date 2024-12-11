<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiFilm extends Model
{
    use HasFactory;

    protected $fillable = ['transaksi_film_id', 'tiket_id'];

    public function transaksiFilm()
    {
        return $this->belongsTo(TransaksiFilm::class);
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}