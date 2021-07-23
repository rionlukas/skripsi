<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kain extends Model
{
    use HasFactory;

    protected $table = 'kains';
    protected $fillable = [
        'NamaKain',
        'KodeKain',
        'JenisKain',
        'Harga',
    ];

    public $timestamps = false;
}
