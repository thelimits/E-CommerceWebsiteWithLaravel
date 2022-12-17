<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\CartTransaction;
use App\Models\Histories;
use App\Models\Member;
use Illuminate\Http\Request;

class Cart extends Controller
{
    public function view(){
        return view('Main_Home.Cart', [
            'title' => 'Cart',
            'active' => 'Cart'
        ]);
    }

    public function insert_cart(Request $request, $role, $id){
        $quan = $request->validate([
            'Quantity' => ['required','min:1']
        ]);
        $credential = [
            'id_Member' => auth()->user()->id,
            'id_Barang' => $id,
            'Quantity' => $quan['Quantity']
        ];
        $barang = CartTransaction::where('id_Member', auth()->user()->id)
                  ->where('id_Barang', $id)->first();

        if(!isset($barang)){
            if(CartTransaction::create($credential)){
                return redirect('/Home/'.auth()->user()->role.'/Cart');
            }
        }else{
            if($barang->update(['Quantity' => $quan['Quantity']])){
                return redirect('/Home/'.auth()->user()->role.'/Cart');
            }
        }
    }

    public function view_carts(){
        $my_id = auth()->user()->id;
        $data = Barang::whereHas('CartTransactions', function($q) use ($my_id){
            $q->where('id_Member', $my_id);
        })->get();

        $quantity = CartTransaction::where('id_Member', '=', $my_id)->get();
        $total_quantity = CartTransaction::where('id_Member', '=', $my_id)->sum('Quantity');

        $price = 0;
        if($total_quantity != 0){
            foreach($data as $item){
                foreach($item->cart as $a){
                    $i = $item->Harga_Barang * $a->Quantity;
                    $price += $i;
                }
            }
        }

        return view('Section.CartSection', [
            'title' => 'Cart',
            'active' => 'Cart',
            'Data' => $data,
            'quan' => $quantity,
            'Total_quantity' => $total_quantity,
            'Total_Price' => $price
        ]);

    }

    public function Delete_Barang($role, $id){
        $barang = CartTransaction::where('id_Barang',  $id)->where('id_Member', auth()->user()->id)->first();
        if($barang){
            $barang->delete();
            return redirect('/Home/'.auth()->user()->role.'/Cart');
        }
    }

    public function Update_Barang_view($role, $id){
        $data = Barang::whereHas('CartTransactions', function($q) use ($id){
            $q->where('id_Barang', $id);
        })->first();
        $quantity = CartTransaction::where('id_Barang', $id)->where('id_Member', auth()->user()->id)->first();

        return view('Section.CartDetailEditSection',[
            'title' => 'Cart',
            'active' => 'Cart',
            'datas'=> $data,
            'quan' => $quantity->Quantity
        ]);

    }

    public function update(Request $request, $role, $id){
        $quan = $request->validate([
            'Quantity' => ['required','min:1']
        ]);
        $barang = CartTransaction::where('id_Member', auth()->user()->id)
                  ->where('id_Barang', $id)->first();
        if(isset($barang)){
            if($barang->update(['Quantity' => $quan['Quantity']])){
                return redirect('/Home/'.auth()->user()->role.'/Cart');
            }
        }
    }

    public function checkout(Request $request, $role){
        // $item = Barang::where('id', $id)->first();
        // $item->update(['Stock' => $item->Stock - $quan['Quantity']]);
        $my_id = auth()->user()->id;
        $data = Barang::whereHas('CartTransactions', function($q) use ($my_id){
            $q->where('id_Member', $my_id);
        })->get();

        $quantity = CartTransaction::where('id_Member', '=', $my_id)->get();

        $total_quantity = CartTransaction::where('id_Member', '=', $my_id)->sum('Quantity');

        if($data){
            $price = 0;
            if($total_quantity != 0){
                foreach($data as $item){
                    foreach($item->cart as $a){
                        $quantity = $a->Quantity;
                        $price_peritems = $item->Harga_Barang * $quantity;
                        $price += $price_peritems;
                        Histories::create([
                            'id_Member' => $my_id,
                            'Nama_Barang' => $item->Nama_Barang,
                            'Jumlah_Barang' => $quantity,
                            'Harga' => $price_peritems,
                        ]);
                        Barang::where('id', $a->id_Barang)->update(['Stock' => $item->Stock - $quantity]);
                    }
                }
            }
            CartTransaction::where('id_Member', $my_id)->delete();
            return redirect('/Home/'.auth()->user()->role.'/History');
        }
    }

}
