<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiMakanan extends Model
{
    use HasFactory;

    protected $fillable = ['transaksi_makanan_id', 'makanan_id', 'jumlah_makanan'];

    public function transaksiMakanan()
    {
        return $this->belongsTo(TransaksiMakanan::class);
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }
}
