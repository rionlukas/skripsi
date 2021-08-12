<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view();
    }

    public function store(Request $request)
    {
        $now = now();
        $request->merge([
            'created_at' => $now,
            'password' => Hash::make($request->password),
        ]);
        User::create($request->all());
        return redirect()->route('login_page')->with('success', 'Berhasil Register User');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
    
    public function show($id)
    {

    }

    public function destroy($id)
    {

    }

    public function login(Request $request)
    {
        $role = ['owner', 'staff', 'admin'];
        $isExist = User::where('email', $request->email)->get();
        $passwordCorrect = false;

        if (Count($isExist) > 0) {
            $checkPass = Hash::check($request->password, $isExist[0]->password);
            
            if ($checkPass) {
                return $this->greeting($isExist);
            } 
            else 
            {
                return back()->with('Failed', 'Password Incorrect');
            }

        } else {
            return back()->with('Failed', 'email or password doesnt exists');
        }
    }

    public function greeting($data)
    {
        dd($data[0]);
        return redirect()->route('user_greeting', ['data' => $data]);
    }
}
