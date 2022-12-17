@extends('Main_Home.Cart')

@section('Section')
<div class="containers m-5">
    <div class="checkout">
        <div class="d-flex justify-content-end align-item-center">
            <h4 class="my-auto">Total Price: Rp{{ number_format($Total_Price, 0, ",", ".") }}</h4>
            <form action="/Home/{{ auth()->user()->role }}/Cart/Checkout" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary ml-3">Check Out {{$Total_quantity}}</button>
            </form>
        </div>
    </div>
    <div class="d-flex flex-wrap" >
        @foreach ($Data as $barang)
            @foreach ($quan as $quans)
                @if ($barang->id == $quans->id_Barang)
                    <div class="card m-4" style="width: 20rem;">
                        <img title="{{ 'Gambar '.$barang->Nama_Barang }}" style="height: 300px" src={{ url('storage/app/public/'.$barang->Image) }} class="card-img-top" alt="{{ $barang->Image }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->Nama_Barang }}</h5>
                            <p class="card-text">Rp{{ number_format($barang->Harga_Barang, 0, ",", ".") }}</p>
                            <p class="card-text">{{ 'Qty: '.$quans->Quantity }}</p>
                            <div class="d-flex">
                                <a href="Cart/Edit/Barang/{{ $barang->id }}"class="btn btn-primary">Edit Cart</a>
                                <a href="Cart/Delete/Barang/{{ $barang->id }}"class="btn btn-danger ml-2">Remove from cart</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
@endsection
