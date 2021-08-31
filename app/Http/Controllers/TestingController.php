<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\EOQ;
use App\Models\Stock;

class TestingController extends Controller
{
    public function testingQuery($KodeKain)
    {
        $jumlahStock = DB::table('stocks')->where('KodeKain', $KodeKain)->select('Jumlah')->get();
        return $jumlahStock[0]->Jumlah;
    }

    public function testString($word)
    {
        return $word;
    }

    public function checkExistingEOQ(Request $request)
    {
        $kodeKain = $request->KodeKain;
        $id = $request->id;

        //check existing eoq
        $n = array("KodeKain" => array(), "Type" => "Not Exists");
        
        for ($i = 0; $i < Count($request->id); $i++) { 
            $data = EOQ::where('KodeKain', $kodeKain[$i])->get();
            if (Count($data) == 0) {
                array_push($n["KodeKain"], $request->KodeKain[$i]);
            }
        }

        if (Count($n["KodeKain"]) > 0)
        {
            return response()->json($n);
        }

        //check unsave stock

        // $dataEOQ = EOQ::where('KodeKain', "010212")->get();
        // return response()->json($dataEOQ);

        $ust = array("KodeKain" => array(), "Type" => "Unsave Stock");
        for ($i = 0; $i < Count($request->id); $i++) { 
            $dataEOQ = EOQ::where('KodeKain', $request->KodeKain[$i])->get();
            $jmlStock = DB::table('stocks')->select('Jumlah')->where('KodeKain', $request->KodeKain[$i])->get();
            $isUnsave = $dataEOQ[$i]->AcuanEOQ - ($jmlStock[$i]->Jumlah + $request->Jumlah);

            if ($isUnsave > 0) {
                array_push($ust["KodeKain"], $request->KodeKain[$i]);
            }
        }

        if (Count($ust["KodeKain"]) > 0)
        {
            return response()->json($ust);
        }

        return "aman";
    }
}
