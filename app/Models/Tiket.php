<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = ['jadwal_id', 'kursi_id', 'status'];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function kursi()
    {
        return $this->belongsTo(Kursi::class);
    }
}