<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOQ extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'JumlahUnit',
        'BiayaPesanan',
        'HargaPembelian',
        'BiayaPenyimpanan',
    ];

    public $timestamps = false;
}
