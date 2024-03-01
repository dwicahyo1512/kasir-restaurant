<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_meja',
        'nomer_meja',
        'status',
        'id_kasirs',
    ];

    /**
     * Get the pesanan associated with the meja.
     */
    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }
}
