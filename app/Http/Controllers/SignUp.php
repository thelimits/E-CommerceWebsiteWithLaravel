<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class SignUp extends Controller
{
    public function ViewSignUp(){
        return view('SignUp',[
            'tittle' => 'SignUp',
            'active' => 'SignUp'
        ]);
    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => ['required', 'min:5', 'max:20', 'unique:member'],
            'email' => ['required', 'email:rfc,dns', 'unique:member'],
            'password' => ['required', 'min:5', 'max:20'],
            'phone' => ['numeric','required', 'digits_between:10,13' ],
            'Address' => ['required', 'min:5']
        ]);
        // $validate['password'] = bcrypt($validate['password']);
        $validate['password'] = Hash::make($validate['password']);


        if(Member::create($validate)){
            return redirect('/SignIn')->with('status', 'Data Tersimpan');
        }else{
            return redirect()->back()->with('status', 'Data Tidak Tersimpan');
        }



        // $member = Member::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'Phone' => $request->phone,
        //     'Address' => $request->Address,
        // ]);
        // return response()->json([
        //     'data' => $member
        // ]);
    }
}
