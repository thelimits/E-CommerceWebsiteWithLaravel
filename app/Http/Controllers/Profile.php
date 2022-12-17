<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class Profile extends Controller
{
    public function view(){
        return view('Main_Home.Profile', [
            'title' => 'Profile',
            'active' => 'Profile',
            'User' => auth()->user()
        ]);
    }

    public function view_edit($role, $id){
        $id = Crypt::decryptString($id);
        $data = Member::where('id', $id)->first();
        // dd($data);
        return view('Main_Home.Update_Profile',[
            'data' => $data,
            'active' => 'Profile',
            'tittle' => 'Edit Profile',
            'role' => $role
        ]);
    }

    public function update(Request $request,$role, $id){
        $id = Crypt::decryptString($id);
        $rules = [
            'name' => ['required', 'min:5', 'max:20', 'unique:member'],
            'email' => ['required', 'email:rfc,dns', 'unique:member'],
            'phone' => ['numeric','required', 'digits_between:10,13' ],
            'Address' => ['required', 'min:5']
        ];
        $Validate = $request->validate($rules);

        Member::where('id', $id)
                ->update($Validate);

        return redirect('/Home/'. $role .'/Profile')->with('status', 'Success Updated');
    }

    public function view_edit_pass($role, $id){
        $id = Crypt::decryptString($id);
        $data = Member::where('id', $id)->first();

        return view('Main_Home.Update_Prof_Pass',[
            'data' => $data,
            'active' => 'Profile',
            'tittle' => 'Edit Password',
            'role' => $role
        ]);
    }

    public function update_password(Request $request,$role, $id){
        $rules = [
            'old_password' => ['required', 'min:5', 'max:20'],
            'password' => ['required', 'min:5', 'max:20']
        ];
        $Validate = $request->validate($rules);
        $id = Crypt::decryptString($id);
        $user = Member::where('id', $id)->first();
        $data = $request->all();
        if(!Hash::check($data['old_password'], $user->password)){
            return Redirect::back()->with('message','Your password is not match with old password');
        }else{
            $validate['password'] = Hash::make($Validate['password']);
            Member::where('id', $id)
                ->update(['password'=> $validate['password']]);
            return redirect('/Home/'. $role . '/Profile')->with('status', 'Your Password Success Updated');
        }
    }
}
