<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'value',
        'min_purchase_amount',
        'start_date',
        'end_date',
    ];

    public function isActiveNow()
    {
        $now = Carbon::now();
        return $now->between($this->start_date, $this->end_date);
    }
}
