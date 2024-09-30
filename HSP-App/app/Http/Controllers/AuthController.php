<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController
{
public function login(){
    return_view('auth.login');
}
public function doLogin(LoginRequest $request){
    $credentials = $request->validated();

    Auth::attempt($credentials);

}
}
