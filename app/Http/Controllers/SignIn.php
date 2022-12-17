<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignIn extends Controller
{
    public function ViewSignin(){
        return view('SignIn',[
            'tittle' => 'SignIn',
            'active' => 'SignIn'
        ]);
    }

    public function authenticante(Request $request){
        $credential = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:5|max:20'
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect()->intended('/Home/'.auth()->user()->role.'/Home');
        }

        return back()->with([
            'Login_Error' => "Login Failed !!!"
        ]);
    }

    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); # root
    }
}
