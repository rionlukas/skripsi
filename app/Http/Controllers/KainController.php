<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kain;
use DB;

class KainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kains = Kain::all();
        return view('master.kain.index', ['kains' => $kains]);
    }

    public function getAllOnlyData() 
    {
        $kains = DB::select('SELECT a.*, IFNULL(b.Jumlah,0) AS qty from kains a
                            LEFT JOIN stocks b ON a.KodeKain = b.KodeKain');
        return $kains;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $kain = Kain::findorfail($id);
        return view('master.kain.edit', ['kain' => $kain]);
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
            'Harga' => 'required',
        ]);

        $kain = Kain::find($id)->update($request->all());

        return redirect()->route('kain_index')->with('Success', 'Data Telah Diperbaharui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kain = Kain::find($id);
        $kain->delete();
        return back()->with('success', 'data berhasil dihapus');
    }
}
