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

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
