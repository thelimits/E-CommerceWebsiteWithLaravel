<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class DataBarang extends Controller
{
    public function view(){
        return view('Main_Home.AddItemForm', [
            'title' => 'Form Add Barang'
        ]);
    }

    public function Data(Request $request){
        $rules = [
            'Image' => ['required', 'file', 'image'],
            'Nama_Barang' => ['required', 'min:5', 'max:20', 'unique:barang'],
            'Description' => ['required', 'min:5'],
            'Harga_Barang' => ['required', 'numeric', 'min:1000', 'integer'],
            'Stock' => ['required', 'numeric', 'min:1', 'integer']
        ];
        $validate = $request->validate($rules);

        $image = $validate['Image'];
        $Ext_Image = $image->clientExtension();

        Storage::putFileAs('public/images',$image, str_replace(' ', '', $validate['Nama_Barang']).'.'.$Ext_Image);
        $Image_Url = 'images/'.str_replace(' ', '', $validate['Nama_Barang']).'.'.$Ext_Image;

        $validate['Image'] = $Image_Url;

        $role = auth()->user()->role;
        if(Barang::create($validate)){
            return redirect('/Home/'. $role . '/Home');
        }else{
            return Redirect::back();
        }
    }

    public function Delete($role, $id){
        $role = auth()->user()->role;
        $item = Barang::where('id', $id)->first();
        if($item){
            $url_image_database = $item->Image;
            if(Storage::exists('public/'.$url_image_database)){
                Storage::delete('public/'.$url_image_database);
            }
            $item->delete();
            return redirect('/Home/'. $role . '/Home');
        }
    }
}
