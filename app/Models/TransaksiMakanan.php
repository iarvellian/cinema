<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiMakanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_harga', 'status', 'tgl_transaksi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailTransaksiMakanans()
    {
        return $this->hasMany(DetailTransaksiMakanan::class);
    }
}
