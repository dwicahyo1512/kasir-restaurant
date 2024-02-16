<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'kategori_id',
        'nama_menu',
        'img_menu',
        'harga_menu',
        'status',
        'keterangan_menu',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
