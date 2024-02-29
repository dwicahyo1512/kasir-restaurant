<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'quantity', 'harga'];

    // Jika Anda perlu menentukan hubungan balik, Anda dapat melakukannya di sini
    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }
}
