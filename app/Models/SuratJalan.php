<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    protected $table = 'surat_jalans';
    protected $fillable = [
        'Salesman',
        'Tanggal',
        'Alamat',
        'KodeKain',
        'NamaKain',
        'Jumlah',
        'Harga',
        'SubTotal',
        'Total',
        'JSONString',
        'OrderId'
    ];

    public $timestamps = false;
}
