<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'totaldiscount',
        'totalpayment',
        'nama_discount',
        'type_discount',
        'value_discount',
        'min_purchase_amount',
        'id_meja',
        'status',
    ];


    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class,  'id_meja');
    }

    public function detail_pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
