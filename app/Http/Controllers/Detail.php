<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class Detail extends Controller
{
    public function view($role, $id){
        $data = Barang::where('id', $id)->first();
        return view('Main_Home.Detail', [
            'title' => 'Detail',
            'active' => 'Home',
            'datas' => $data
        ]);
    }

}
