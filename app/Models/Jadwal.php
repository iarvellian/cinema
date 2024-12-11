<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['film_id', 'tgl_tayang', 'jam_tayang', 'harga'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}