<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Stock;

use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
                ->where('Status', '=', 'Belum Disetujui')
                ->get();

        return view('owner.order.acc')->with(compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'OrderId' => 'required',
            'NamaCustomer' => 'required',
            'KodeKain' => 'required',
            'NamaKain' => 'required', 
            'JenisKain' => 'required', 
            'Jumlah' => 'required', 
            'Keterangan' => 'required',  
            'Tanggal' => 'required', 
          ]);
        
          $input = $request->all();
        
          $stock = Order::create($input);

          return back()->with('Success', 'Menunggu ACC');
    }

    public function approval($id, $value)
    {
        $dataOrder = Order::where('id', $id)->get();
        if ($value == 'Disetujui') {
            $KodeKain = '';
            $jumlah = 0;

            foreach ($dataOrder as $item) {
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

          $updateStatusOrder = DB::table('orders')
          ->where('id', $id)
          ->update([
              'Status' => $value
            ]);

            return redirect()->route('order_approved');
        }
         
        return redirect()->route('order_acc');
    }

    public function approvedOrder() 
    {
        $orders = DB::table('orders')
                ->where('Status', '=', 'Disetujui')
                ->get();

        return view('owner.order.approvedOrder')->with(compact('orders'));
    }
}

