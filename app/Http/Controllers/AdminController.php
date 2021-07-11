<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

        auth()->user()->assignRole('admin');
        return view('admin.index');
    }
}
