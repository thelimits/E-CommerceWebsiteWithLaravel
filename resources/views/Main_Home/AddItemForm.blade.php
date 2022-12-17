<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('CSS/sign.css') }}">
    <title>{{ $title }}</title>
    <style>
        input[type="file"] {
        background: none;
        border: none;
        transform: translateX(-11px)
    }
    </style>
</head>
<body>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="header">
            <h3>Add Item</h3>
        </div>
        <form action="/Home/{{ auth()->user()->role }}/AddItem" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Clothes Image</label>
                <input name="Image" type="file" class="form-control
                @if ($errors->has('Image'))
                    @if ($errors->has('Image'))
                        is-invalid
                    @else
                        is-valid
                    @endif
                @endif
                " id="formFile">
                @error('Image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Nama_Barang" class="form-label">Clothes Name</label>
                <input name="Nama_Barang" type="text" class="form-control
                @if ($errors->has('Nama_Barang'))
                    @if ($errors->has('Nama_Barang'))
                        is-invalid
                    @else
                        is-valid
                    @endif
                @endif
                " id="Nama_Barang" aria-describedby="emailHelp" value="{{ old('Nama_Barang') }}" placeholder="(5-20 letters)">
                @error('Nama_Barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Description" class="form-label">Clothes Desc</label>
                <input name="Description" type="text" class="form-control
                @if ($errors->has('Description'))
                    @if ($errors->has('Description'))
                        is-invalid
                    @else
                        is-valid
                    @endif
                @endif
                " id="Description" aria-describedby="emailHelp" value="{{ old('Description') }}" placeholder="(min 5 letters)">
                @error('Description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Harga_Barang" class="form-label">Clothes Price</label>
                <input name="Harga_Barang" type="text" class="form-control
                @if ($errors->has('Harga_Barang'))
                    @if ($errors->has('Harga_Barang'))
                        is-invalid
                    @else
                        is-valid
                    @endif
                @endif
                " id="Harga_Barang" aria-describedby="emailHelp" value="{{ old('Harga_Barang') }}" placeholder="> 1000">
                @error('Harga_Barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Stock" class="form-label">Clothes Stock</label>
                <input name="Stock" type="number" class="form-control
                @if ($errors->has('Stock'))
                    @if ($errors->has('Stock'))
                        is-invalid
                    @else
                        is-valid
                    @endif
                @endif
                " id="Stock" aria-describedby="emailHelp" value="{{ old('Stock') }}" placeholder="> 1">
                @error('Stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-danger" style="
            width: 100%; margin-top: 5%">Add</button>
            <br><br>
        </form>
    </div>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/fontawesome.min.js" integrity="sha512-j3gF1rYV2kvAKJ0Jo5CdgLgSYS7QYmBVVUjduXdoeBkc4NFV4aSRTi+Rodkiy9ht7ZYEwF+s09S43Z1Y+ujUkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
