@extends('Header.HeaderHome')
@section('title', "$title")
@section('main')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('CSS/Home.css') }}">

    <div class="container">
        <div class="card mb-3 mt-5" style="width: 800px; height: 400px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="card ml-3 mt-3" style="height: 250px" src={{ url('storage/app/public/'.$datas->Image) }} class="card-img-top" alt="{{ $datas->Image }}">
              </div>
              <div class="col-md-8">
                @if (auth()->user()->role == 'Admin')
                <div class="card-body card mr-3 mt-3" style="text-align: left; height: 250px">
                @else
                <div class="card-body card mr-3 mt-3" style="text-align: left; height: 350px">
                @endif
                    <h5 class="card-title" style="width: 15rem">{{ $datas->Nama_Barang }}</h5>
                    <p class="card-text" style="border-bottom: 2px solid rgb(210, 210, 210)">Rp{{ number_format($datas->Harga_Barang, 0, ",", ".") }}</p>
                    <h6 class="card-title" >Product Detail</h6>
                    <p class="card-text" style="border-bottom: 6px solid rgb(210, 210, 210)">{{ $datas->Description}}</p>
                    @if(auth()->user()->role == 'Admin')
                        <div class="wraps">
                            <a style="width: 200px" href="/Home/{{ auth()->user()->role }}/Home" class="btn btn-danger"> Back </a>
                            <a href="/Home/{{ auth()->user()->role }}/Delete/{{ $datas->id }}" class="btn btn-danger"> Delete Item </a>
                        </div>
                    @else
                        <label for="exampleInputQuantity" class="form-label">Quantity: </label>
                        <form action="/Home/{{ auth()->user()->role }}/Cart/Edit/Barang/{{ $datas->id }}/update" method="POST" style="display: flex; align-items: center; justify-content: space-between">
                            @csrf
                            <input value="{{ $quan }}" max="{{ $datas->Stock }}" min="1" name="Quantity" style="height: 35px; border: 1px solid rgb(210, 210, 210); text-align: center" type="number" id="exampleInputQuantity">
                            <button type="submit" class="btn btn-success ml-3" style="width: 60%"> Update Cart </button>
                        </form>
                        @error('Quantity')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                        @enderror
                        <a style="width: 200px" href="/Home/{{ auth()->user()->role }}/Cart" class="btn btn-danger mt-2"> Back </a>
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/fontawesome.min.js" integrity="sha512-j3gF1rYV2kvAKJ0Jo5CdgLgSYS7QYmBVVUjduXdoeBkc4NFV4aSRTi+Rodkiy9ht7ZYEwF+s09S43Z1Y+ujUkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
