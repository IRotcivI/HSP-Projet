<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController
{
public function login(){
    return view('auth.login');
}
public function doLogin(LoginRequest $request){
    $credentials = $request->validated();

    if (Auth::attempt($credentials)){
        session()->regenerate();
    }
    return to_route('auth.login')->withErrors([
        'email'=> 'Email invalide'
    ])->onlyInput('email');

}
}
