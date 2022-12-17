@extends('Header.Header')
@section('main')
    <!-- link for font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- link jquery script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('CSS/Section.css') }}">
    <div class="Section-Bg">
        <div class="Section-Wrapper">
            <div id="Text-Wrapper">
                <div id="Text-Welcoming">
                    <h1> Welcome To <span> MaiBoutiQue </span> </h1>
                </div>
                <div class="buttons">
                    <h5>Sign Up</h5>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.Section-Bg .Section-Wrapper #Text-Wrapper .buttons').on('click', ()=>{
            window.location.href = '/SignUp'
        });
    </script>
@endsection

