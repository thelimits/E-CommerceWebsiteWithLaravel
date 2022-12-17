<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('CSS/WelcomePage.css') }}">
</head>
<body>
    <div class="header">
        <div class="Left-header">
            <h1 id="Logo-Wrapper">
                <a href="/"> <span>MAIBOUTIQUE</span> </a>
            </h1>
        </div>
        <div class="Right-header">
            <div id="sign">
                <a href="/SignIn"> <span>Sign In</span> </a>
            </div>
        </div>
    </div>
    @yield('main')
</body>
</html>
