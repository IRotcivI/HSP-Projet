<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store (Request $request)
    {
        $request-> validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:8',
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return back ();
    }
    public function created()
    {
        return view('auth.register');
    }
}
