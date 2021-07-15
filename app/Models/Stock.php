<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $fillable = [
        'KodeKain',
        'NamaKain',
        'JenisKain',
        'Jumlah',
        'Supplier',
        'Tanggal',
        'Keterangan',
        'Status',
    ];

    public $timestamps = false;
}
