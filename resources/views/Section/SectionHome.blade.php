@extends('Main_Home.Home')

@section('Section')
<div class="containers" style="width:50%; margin-left: auto; margin-right: auto">
    <div class="d-flex flex-wrap" >
        @foreach ($Data as $barang)
            <div class="card m-4" style="width: 15rem;">
                <div class="image" >
                    @if ($barang->Stock <= 0)
                        <img class="mt-5" src="{{ asset('Asset/PngItem_2532316.png') }}" style="width: 238px; z-index: 1; position: absolute">
                    @endif
                    <img title="{{ 'Gambar '.$barang->Nama_Barang }}" style="height: 250px" src={{ url('storage/app/public/'.$barang->Image) }} class="card-img-top" alt="{{ $barang->Image }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $barang->Nama_Barang }}</h5>
                    <p class="card-text">Rp{{ number_format($barang->Harga_Barang, 0, ",", ".") }}</p>
                    <div class="d-flex">
                        <a href="Detail/Barang/{{ $barang->id }}"class="btn btn-primary">More Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container">
    {{ $Data->links() }}
</div>
@endsection
