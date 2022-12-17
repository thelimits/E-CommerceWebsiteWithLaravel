<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .active{
            color: black;
        }

    </style>
    <title>@yield('title')</title>
</head>
<body>
    @if (auth()->user()->role == 'Member')
      <nav class="navbar navbar-expand-lg bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="/Home/{{ auth()->user()->role }}/Home"><span style="
              color: rgb(117, 117, 117);
              font-weight: 600
              ">MAI BOUTIQUE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav" >
                <li class="nav-item">
                  <a class="nav-link @if($active == "Home")
                      active
                  @endif" aria-current="page" href="/Home/{{ auth()->user()->role }}/Home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($active == "Search")
                      active
                  @endif" href="/Home/{{ auth()->user()->role }}/Search">Search</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($active == "Cart")
                      active
                  @endif" href="/Home/{{ auth()->user()->role }}/Cart">Cart</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($active == "History")
                      active
                  @endif" href="/Home/{{ auth()->user()->role }}/History">History</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($active == "Profile")
                      active
                  @endif" href="/Home/{{ auth()->user()->role }}/Profile">Profile</a>
                </li>
              </ul>
            </div>
            <form action="/Logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-info"><span>{{ auth()->user()->name}}</span></button>
            </form>
          </div>
      </nav>
    @endif
    @if (auth()->user()->role == 'Admin')
      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/Home/{{ auth()->user()->role }}/Home"><span style="
            color: rgb(117, 117, 117);
            font-weight: 600
            ">MAI BOUTIQUE</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" >
              <li class="nav-item">
                <a class="nav-link @if($active == "Home")
                    active
                @endif" aria-current="page" href="/Home/{{ auth()->user()->role }}/Home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if($active == "Search")
                    active
                @endif" href="/Home/{{ auth()->user()->role }}/Search">Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if($active == "Profile")
                    active
                @endif" href="/Home/{{ auth()->user()->role }}/Profile">Profile</a>
              </li>
            </ul>
          </div>
          <a href="/Home/{{ auth()->user()->role }}/AddItem" class="btn btn-outline-info mr-4"><span>Add Items</span></a>
          <form action="/Logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-outline-info"><span>{{ auth()->user()->name}}</span></button>
          </form>
        </div>
      </nav>
    @endif
    @yield('main')
    @yield('updt')
</body>
</html>
