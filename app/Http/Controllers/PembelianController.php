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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'KodeKain' => 'required',
            'NamaKain' => 'required', 
            'JenisKain' => 'required', 
            'Jumlah' => 'required', 
          ]);
        
          $input = $request->all();
        
          $stock = Stock::create($input);

          return redirect()->route('stock')->with('success', 'Kain baru berhasil ditambahkan');
    }
}
