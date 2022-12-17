<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class Home extends Controller
{
    public function view(){
        return view('Main_Home.Home', [
            'title' => 'Home',
            'active' => 'Home',
        ]);
    }

    public function getBarang(){
        $data = Barang::latest()->paginate(8);
        return view('Section.SectionHome', [
            'title' => 'Home',
            'active' => 'Home',
            'Data' => $data,
        ]);
    }
}
