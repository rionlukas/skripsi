<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Kain;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('owner.stock.index', ['stocks' => DB::table('stocks')->paginate(10)
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kains = Kain::all();
        return view('owner.stock.create', ['kains' => $kains]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'KodeKain' => 'required',
            'NamaKain' => 'required', 
            'JenisKain' => 'required', 
            'Jumlah' => 'required', 
          ]);

          $request->merge([
              'Keterangan' => '',
              'Supplier' => ''
          ]);

          $existing = Stock::where('KodeKain', $request->KodeKain)->get();

          if (Count($existing) > 0) {
              $jmlUpdated = $existing[0]->Jumlah + $request->Jumlah;
              Stock::find($existing[0]->id)->update([
                  'Jumlah' => $jmlUpdated 
              ]);
              return redirect()->route('stock')->with('success', 'Kain ' . $request->NamaKain . ' berhasil diupdate');
          }
        
          $input = $request->all();
        
          $stock = Stock::create($input);

          return redirect()->route('stock')->with('success', 'Kain baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);

        return view('owner.stock.edit', ['stock' => $stock]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'KodeKain' => 'required',
            'NamaKain' => 'required', 
            'JenisKain' => 'required', 
            'Jumlah' => 'required',
        ]);

        $stock = Stock::find($id)->update($request->all());

        return redirect()->route('stock')->with('Success', 'Data Telah Diperbaharui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return back()->with('success', 'data berhasil dihapus');
    }
}
