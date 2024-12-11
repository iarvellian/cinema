<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_makanan', 'deskripsi', 'harga', 'gambar_url'];

    public function detailTransaksiMakanans()
    {
        return $this->hasMany(DetailTransaksiMakanan::class);
    }
}
