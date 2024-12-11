<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'cuplikan_url', 'tgl_tayang', 'status'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
