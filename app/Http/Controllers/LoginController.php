<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function logar(Request $request){

        $log = $request->validate([
            'email' => ['required', 'email'],
            'password' =>  ['required']
        ]);

        if(Auth::attempt($log)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }else{
            return back()->with('erro', 'login errado');
        }
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

}
