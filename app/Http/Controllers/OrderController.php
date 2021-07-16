<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
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
            'NamaCustomer' => 'required',
            'KodeKain' => 'required',
            'NamaKain' => 'required', 
            'JenisKain' => 'required', 
            'Jumlah' => 'required', 
            'Keterangan' => 'required',  
            'Tanggal' => 'required', 
          ]);
        
          $input = $request->all();
        
          $stock = Stock::create($input);

          return redirect()->route('pembelian_acc')->with('success', 'Menunggu Acc');
    }

    public function approval($id, $value)
    {
        $affected = DB::table('stocks')
              ->where('id', $id)
              ->update(['Status' => $value]);

        return redirect()->route('pembelian_acc');
    }
}
}
