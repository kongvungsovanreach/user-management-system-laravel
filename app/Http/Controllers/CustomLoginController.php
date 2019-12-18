<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomLoginController extends Controller
{
    function customLoginForm(){
        return view("custom-login");
    }

    function customLoginAction(Request $request){
        $credential = [
            "email"=>$request->email,
            "password"=>$request->password
        ];
        if(\Auth::attempt($credential)){
            return redirect("/home");
        }else{
            return view("/custom-login")->with("errorLogin", "Wrong credential given!");
        }
    }
}
