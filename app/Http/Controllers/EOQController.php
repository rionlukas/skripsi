<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kain;
use App\Models\EOQ;

class EOQController extends Controller
{
    public function index()
    {
        $eoqs = EOQ::all();
        return view('eoq.index', compact('eoqs'));
    }

    public function store(Request $request)
    {
        EOQ::create($request->all());
        return redirect()->route('eoq_create');
    }

    public function edit($id)
    {
        $eoq = EOQ::findorfail($id);
        $kains = Kain::all();
        return view('eoq.edit', ["eoq" => $eoq, "kains" => $kains]);
    }

    public function update(Request $request, $id)
    {
        EOQ::find($id)->update($request->all());
        return redirect()->route('eoq_index')->with('Success', 'Data Telah Diperbaharui !');
    }

    public function destroy($id)
    {
        EOQ::find($id)->delete();
        return redirect()->route('eoq_index')->with('Deleted', 'Data Telah Dihapus !');
    }
}
