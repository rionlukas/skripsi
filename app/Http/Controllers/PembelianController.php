<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Pembelian;

use DB;

class PembelianController extends Controller
{
    //

    public function index()
    {
        $pembelians = DB::table('pembelians')
                ->where('Status', '=', 'Belum Disetujui')
                ->get();

        return view('owner.pembelian.acc')->with(compact('pembelians'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'TransactionId' => 'required',
            'KodeKain' => 'required',
            'NamaKain' => 'required', 
            'JenisKain' => 'required', 
            'Jumlah' => 'required', 
            'Keterangan' => 'required', 
            'Supplier' => 'required', 
            'Tanggal' => 'required', 
          ]);
        
          $input = $request->all();
        
          $stock = Pembelian::create($input);

          return back()->with('Success', 'Menunggu ACC');
    }

    public function approval($id, $value)
    {
        $dataPembelian = Pembelian::where('id', $id)->get();
        if ($value == 'Disetujui') {
            $KodeKain = '';
            $jumlah = 0;

            foreach ($dataPembelian as $item) {
                $KodeKain = $item->KodeKain;
                $jumlah = $item->Jumlah;
            }

            $existingStock = Stock::where('KodeKain', $KodeKain)->get();
          $jumlahExisting = 0;

          foreach ($existingStock as $item) {
              $jumlahExisting = $item->Jumlah;
          }

          $jumlahAkhir = $jumlahExisting - $jumlah;

          $affected = DB::table('stocks')
              ->where('KodeKain', $KodeKain)
              ->update([
                  'Jumlah' => $jumlahAkhir
                ]);

          $updateStatusPembelian = DB::table('pembelians')
          ->where('id', $id)
          ->update([
              'Status' => $value
            ]);

            return redirect()->route('pembelian_approved');
        }
         
        return redirect()->route('pembelian_acc');
    }

    public function approvedPembelian() 
    {
        $pembelians = DB::table('pembelians')
                ->where('Status', '=', 'Disetujui')
                ->get();

        return view('owner.pembelian.approvedPembelian')->with(compact('pembelians'));
    }
}

