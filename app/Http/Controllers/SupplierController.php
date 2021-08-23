<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    //api
    public function GetAll() 
    {
        return $suppliers = Supplier::all();
    }

    public function index()
    {
        $suppliers = Supplier::all();
        return view('owner.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('owner.supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'KodeSupplier' => 'required',
            'NamaSupplier' => 'required', 
            'Alamat' => 'required', 
            'Kota' => 'required', 
            'Telepon' => 'required', 
          ]);
        
          $input = $request->all();
        
          $Supplier = Supplier::create($input);

          return redirect()->route('supplier_index')->with('success', 'Kain baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        // dd($supplier);
        return view('owner.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id)->update($request->all());

        return redirect()->route('supplier_index')->with('Success', 'Data Telah Diperbaharui !');
    }

    public function destroy($id)
    {
        $Supplier = Supplier::find($id)->delete();
        return back()->with('success', 'data berhasil dihapus');
    }
}
