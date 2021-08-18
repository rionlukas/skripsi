<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestingController extends Controller
{
    public function testingQuery($KodeKain)
    {
        $jumlahStock = DB::table('stocks')->where('KodeKain', $KodeKain)->select('Jumlah')->get();
        return $jumlahStock[0]->Jumlah;
    }

    public function testString($word)
    {
        return $word;
    }
}
