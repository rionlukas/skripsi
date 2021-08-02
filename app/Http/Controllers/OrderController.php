<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Kain;
use App\Models\SuratJalan;
use PDF;

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
        $orderId = $request->OrderId;
        $namaCustomer = $request->NamaCustomer;
        $namaKain = $request->NamaKain;
        $kodeKain = $request->KodeKain;
        $jenisKain = $request->JenisKain;
        $jumlah = $request->Jumlah;
        $harga = $request->Harga;
        $totalHarga = $request->TotalHarga;
        $tglOrder = $request->Tanggal;
        $keterangan = $request->Keterangan;
        $status = $request->Status;
        
        for ($i=0; $i < Count($request->OrderId); $i++) { 
            $dataSave = [
                'OrderId' => $orderId[$i],
                'NamaCustomer' => $namaCustomer[$i],
                'NamaKain' => $namaKain[$i],
                'KodeKain' => $kodeKain[$i],
                'JenisKain' => $jenisKain[$i],
                'Jumlah' => $jumlah[$i],
                'Harga' => $harga[$i],
                'TotalHarga' => $totalHarga[$i],
                'TanggalOrder' => $tglOrder[$i],
                'Keterangan' => $keterangan[$i],
                'Status' => $status[$i],
            ];

            Order::create($dataSave);
        }

          return back()->with('Success', 'Menunggu ACC');
    }

    public function approval($id, $value, $jmlAcc)
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

        //   $affected = DB::table('stocks')
        //       ->where('KodeKain', $KodeKain)
        //       ->update([
        //           'Jumlah' => $jumlahAkhir
        //         ]);

          $updateStatusOrder = DB::table('orders')
          ->where('id', $id)
          ->update([
              'Status' => $value,
              'JumlahAcc' => $jmlAcc
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

    public function GetAllOrder()
    {
        $orders = Order::all();     
        return $orders;                                                       
    }

    public function pageSuratJalan()
    {
        $orders = Order::all();
        return view('owner.order.suratJalan', compact('orders'));
    }

    public function createSuratJalan(Request $request)
    {
        $request->merge([
            'JSONString' => '',
            'Total' => 0
        ]);
        
        $input = $request->all();
        $sj = SuratJalan::create($input);
        return $this->printSuratJalan($sj->OrderId);
        // return back()->with('Success', 'Surat Jalan Berhasil dibuat');
    }

    public function printSuratJalan($orderId)
{
        $orderId = 'order_001';
        $orders = DB::select(DB::raw("
            SELECT a.*, b.NamaCustomer
            FROM surat_jalans a
            LEFT JOIN orders b ON a.OrderId = b.OrderId
            WHERE b.OrderId = '$orderId'
        "));

        view()->share('owner.order.printSuratJalan', $orders);
        $pdf = PDF::loadView('owner.order.printSuratJalan', ['orders' => $orders]);
        return $pdf->download('suratjalan.pdf');
    }

    public function testingPrint() 
    {
        $pdf = PDF::loadView('testingPrint');
        return $pdf->download('testing.pdf');
    }

    public function createTesting()
    {
        $kains = Kain::all();
        return view('testing.create', ['kains' => $kains]);
    }

    public function storeTesting(Request $request)
    {
        $orderId = $request->OrderId;
        $namaCustomer = $request->NamaCustomer;
        $namaKain = $request->NamaKain;
        $kodeKain = $request->KodeKain;
        $jenisKain = $request->JenisKain;
        $jumlah = $request->Jumlah;
        $harga = $request->Harga;
        $totalHarga = $request->TotalHarga;
        $tglOrder = $request->Tanggal;
        $keterangan = $request->Keterangan;
        $status = $request->Status;
        
        for ($i=0; $i < Count($request->OrderId); $i++) { 
            $dataSave = [
                'OrderId' => $orderId[$i],
                'NamaCustomer' => $namaCustomer[$i],
                'NamaKain' => $namaKain[$i],
                'KodeKain' => $kodeKain[$i],
                'JenisKain' => $jenisKain[$i],
                'Jumlah' => $jumlah[$i],
                'Harga' => $harga[$i],
                'TotalHarga' => $totalHarga[$i],
                'TanggalOrder' => $tglOrder[$i],
                'Keterangan' => $keterangan[$i],
                'Status' => $status[$i],
            ];

            Order::create($dataSave);
        }
    }

    //api

    public function api_approval($id, $value, $jmlAcc)
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

        //   $affected = DB::table('stocks')
        //       ->where('KodeKain', $KodeKain)
        //       ->update([
        //           'Jumlah' => $jumlahAkhir
        //         ]);

          $updateStatusOrder = DB::table('orders')
          ->where('id', $id)
          ->update([
              'Status' => $value,
              'JumlahAcc' => $jmlAcc
            ]);
        } else {
            DB::table('orders')
              ->where('id', $id)
              ->update([
                  'Status' => $value,
                ]);
        }

    }

}
//tes






