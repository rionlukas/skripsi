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
}
