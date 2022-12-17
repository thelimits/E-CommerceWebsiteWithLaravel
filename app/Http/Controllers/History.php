<?php

namespace App\Http\Controllers;

use App\Models\Histories;
use Illuminate\Http\Request;

class History extends Controller
{
    public function view($role){
        $data = Histories::selectRaw('Jumlah_Barang, Nama_Barang, Harga, created_at as dates')
                ->where('id_Member', auth()->user()->id)
                ->orderBy('dates', 'desc')
                ->get()
                ->groupBy('dates');

        return view('Main_Home.History', [
            'title' => 'History',
            'active' => 'History',
            'data' => $data,
        ]);
    }
}
