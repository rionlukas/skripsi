<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Pembelian;
use App\Models\Kain;

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
        $kains = Kain::all();
        return view('owner.pembelian.create', ['kains' => $kains]);
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
            $NamaKain = '';
            $JenisKain = '';
            $jumlah = 0;
            $Supplier = '';
            $Tanggal = '';
            $Keterangan = '';
            $Status = '';


            foreach ($dataPembelian as $item) {
                $KodeKain = $item->KodeKain;
                $NamaKain = $item->NamaKain;
                $JenisKain = $item->JenisKain;
                $jumlah = $item->Jumlah;
                $Supplier = $item->Supplier;
                $Tanggal = $item->Tanggal;
                $Keterangan = $item->Keterangan;
                $Status = $item->Status;
            }

            $existingStock = Stock::where('KodeKain', $KodeKain)->get();

            if (count($existingStock) == 0) {
                  DB::table('stocks')->insert([
                    [
                        'KodeKain' => $KodeKain, 
                        'NamaKain' => $NamaKain, 
                        'JenisKain' => $JenisKain, 
                        'Jumlah' => $jumlah, 
                        'Supplier' => $Supplier, 
                        'Tanggal' => $Tanggal, 
                        'Keterangan' => $Keterangan, 
                        'Status' => $Status, 
                    ]
                ]);
            } 
            else 
            {
                $existingJumlah = 0;
                foreach ($existingStock as $item) {
                    $existingJumlah = $item->Jumlah;
                }
                Stock::where('KodeKain', $KodeKain)->update([
                    'Jumlah' => $existingJumlah + $jumlah
                ]);
            }

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

