<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians';
    protected $fillable = [
        'TransactionId',
        'Supplier',
        'NamaKain',
        'KodeKain',
        'JenisKain',
        'Jumlah',
        'TanggalPembelian',
        'Keterangan',
        'Status',
    ];

    public $timestamps = false;
}
