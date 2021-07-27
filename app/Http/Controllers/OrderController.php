<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Kain;

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
        $kains = Kain::all();
        return view('owner.order.create', ['kains' => $kains]);
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
            'Harga' => 'required', 
            'TotalHarga' => 'required', 
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

    public function show($KodeKain){
        
        $order = Order::findOrFail($KodeKain);
        // dd($order);

        return view('owner.order.nota', ['order' => $order]);
    }

    public function testing($kodeKain) {
        $order = Order::where('KodeKain', $kodeKain)->get();
        return view('owner.order.nota', ['order' => $order]);
    }

}






