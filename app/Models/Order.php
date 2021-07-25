<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'OrderId',
        'NamaCustomer',
        'NamaKain',
        'KodeKain',
        'JenisKain',
        'Jumlah',
        'Harga',
        'TotalHarga',
        'TanggalOrder',
        'Keterangan',
        'Status',
    ];

    public $timestamps = false;
}
