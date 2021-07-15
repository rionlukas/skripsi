<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PembelianController extends Controller
{
    //

    public function index()
    {
        $stocks = DB::table('stocks')
                ->where('status', '=', 'Belum Disetujui')
                ->get();

        return view('owner.pembelian.acc')->with(compact('stocks'));
    }
}
