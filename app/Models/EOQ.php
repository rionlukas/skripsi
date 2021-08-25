<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOQ extends Model
{
    protected $table = 'eoq';
    protected $fillable = [
        'KodeKain',
        'NamaKain',
        'JumlahUnit',
        'BiayaPesanan',
        'HargaPembelian',
        'BiayaPenyimpanan',
        'EOQ',
        'JumlahOPT',
        'FrekuensiOrder',
        'AcuanEOQ'
    ];

    public $timestamps = false;
}
