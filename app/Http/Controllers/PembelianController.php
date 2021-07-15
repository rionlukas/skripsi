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
                ->where('Status', '=', 'Belum Disetujui')
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

          return redirect()->route('pembelian_acc')->with('success', 'Kain baru berhasil ditambahkan');
    }

    public function approval($id, $value)
    {
        $affected = DB::table('stocks')
              ->where('id', 1)
              ->update(['Status' => $value]);

        return redirect()->route('pembelian_acc');
    }
}
