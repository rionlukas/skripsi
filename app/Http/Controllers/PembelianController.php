<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Pembelian;
use App\Models\Kain;
use App\Models\Supplier;
use App\Models\EOQ;
use PDF;

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
        $suppliers = Supplier::all();
        return view('owner.pembelian.create', ['kains' => $kains, 'suppliers' => $suppliers]);
    }

    public function store(Request $request)
    {
        $trxId = $request->TransactionId;
        $supplier = $request->Supplier;
        $namaKain = $request->NamaKain;
        $kodeKain = $request->KodeKain;
        $jenisKain = $request->JenisKain;
        $jumlah = $request->Jumlah;
        $tgl = $request->Tanggal;
        $keterangan = $request->Keterangan;
        $status = $request->Status;
        $totalHarga = $request->TotalHarga;

        for ($i=0; $i < Count($request->TransactionId); $i++) { 
            $dataSave = [
                'TransactionId' => $trxId[$i],
                'Supplier' => $supplier[$i],
                'NamaKain' => $namaKain[$i],
                'KodeKain' => $kodeKain[$i],
                'JenisKain' => $jenisKain[$i],
                'Jumlah' => $jumlah[$i],
                'TanggalPembelian' => $tgl[$i],
                'Keterangan' => $keterangan[$i],
                'Status' => $status[$i],
                'JumlahAcc' => 0,
                'TotalHarga' => $totalHarga[$i],
            ];

            Pembelian::create($dataSave);
        }

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

    //api
    public function api_approval($id, $value, $jmlAcc)
    {
        $dataPembelian = Pembelian::where('id', $id)->get();
        if ($value == 'Disetujui') {
          DB::table('pembelians')
          ->where('id', $id)
          ->update([
              'Status' => $value,
              'JumlahAcc' => $jmlAcc
            ]);
        } else 
        {
            DB::table('pembelians')
          ->where('id', $id)
          ->update([
              'Status' => 'Ditolak'
            ]);
        }

        return $value;
    }

    public function checkExistingEOQ(Request $request)
    {
        //check existing eoq
        $n = array("KodeKain" => array(), "Type" => "Not Exists");
        
        if (is_array($request["TransactionId[]"])) {
            for ($i = 0; $i < Count($request["TransactionId[]"]); $i++) { 
                $data = EOQ::where('KodeKain', $request["KodeKain[]"][$i])->get();
                if (Count($data) == 0) {
                    array_push($n["KodeKain"], $request["KodeKain[]"][$i]);
                }
            }
    
            if (Count($n["KodeKain"]) > 0)
            {
                return response()->json($n);
            }
    
            //check unsave stock
    
            $ust = array("KodeKain" => array(), "Type" => "Unsave Stock");
            for ($i = 0; $i < Count($request["TransactionId[]"]); $i++) { 
                $dataEOQ = EOQ::where('KodeKain', $request["KodeKain[]"][$i])->get();
                $jmlStock = DB::table('stocks')->select('Jumlah')->where('KodeKain', $request["KodeKain[]"][$i])->get();
                $isUnsave = $dataEOQ[$i]->AcuanEOQ - ($jmlStock[$i]->Jumlah + $request->Jumlah);
    
                if ($isUnsave > 0) {
                    array_push($ust["KodeKain"], $request["KodeKain[]"][$i]);
                }
            }
    
            if (Count($ust["KodeKain"]) > 0)
            {
                return response()->json($ust);
            }
        } else {
            // check existing eoq
            $data = EOQ::where('KodeKain', $request["KodeKain[]"])->get();
            if (Count($data) == 0) {
                array_push($n["KodeKain"], $request["KodeKain[]"]);
            }

            if (Count($n["KodeKain"]) > 0)
            {
                return response()->json($n);
            }

            //check unsave stock
            $ust = array("KodeKain" => array(), "Type" => "Unsave Stock");
            $dataEOQ = EOQ::where('KodeKain', $request["KodeKain[]"])->get();
            $jmlStock = DB::table('stocks')->select('Jumlah')->where('KodeKain', $request["KodeKain[]"])->get();
            $isUnsave = $dataEOQ[0]->AcuanEOQ - ($jmlStock[0]->Jumlah + $request["Jumlah[]"]);

            if ($isUnsave > 0) {
                array_push($ust["KodeKain"], $request["KodeKain[]"]);
            }

            if (Count($ust["KodeKain"]) > 0)
            {
                return response()->json($ust);
            }
        }


        return "aman";
    }

    public function printNota($transactionId)
    {
        $orders = Pembelian::where('TransactionId', $transactionId)->get();
        $totals = 0;
        foreach ($orders as $item) {
            $totals += $item->TotalHarga;
        } 
        view()->share('owner.pembelian.nota', $orders);
        $pdf = PDF::loadView('owner.pembelian.nota', ['orders' => $orders, 'totals' => $totals]);
        return $pdf->download('nota pembelian.pdf');
    }
    
}

