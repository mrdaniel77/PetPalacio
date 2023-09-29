<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.log');
    }

    public function home(Request $request){
        $log = $request->validate([
            'email' => ['required', 'email'],
            'password' =>  ['required']
        ]);

        if(Auth::attempt($log)){
            $request->session()->regenerate();
            return view('layout.dashboard');
        }else{
            return back()->with('erro', 'log errado');
        }
    }
    
    public function logout(){
        return view('home');
    }

}
