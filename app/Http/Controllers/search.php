<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class search extends Controller
{
    public function view(){
        return view('Main_Home.Search', [
            'title' => 'Search',
            'active' => 'Search',
        ]);
    }

    public function search(){
        return view('Section.SearchSection',[
            'title' => 'Search',
            'active' => 'Search',
            'Data' => Barang::latest()->Searching(request(['search']))->paginate(8)
        ]);
    }
}
