<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;

    protected $fillable = [ 'baris', 'no_kursi'];

    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
