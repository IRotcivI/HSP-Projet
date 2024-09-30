<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthController
{
public function login(){
    return_view('auth.login');
}
public function doLogin(LoginRequest $request){

}
}
