<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Orizin</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .fa{
            padding: 10px;
            font-size: 12px;
            width: 30px;
            height:30px;
            text-align: center;
            border-radius: 20%;
            background:  #ff6600;
            color: white;
        }
        .fa:hover{
            text-decoration: none;
            color:white;
            opacity:0.7;
        }
        label {
            padding-left: 140px;
        }

        #app {
            background: white;
            height: 1000px;
        }
        footer {
            position: static;
            height: 30px;
        }
        a{
            text-decoration: none;
            color:gray;
        }
        a:hover{
            text-decoration: none;
            color: #ff6600;
        }
        .navbar {
            height: 63px;
        }

        #product img{
            width:240px;
            height:300px;
        }
        #product #gambar{
            border:1px solid lightgrey;
            padding: 10px;
            width: 270px;
            height: 360px;
            position:relative;
        }
        #product #gambar #harga{
            color: #ff6600;
            font-size: 20px;
        }
        #product .glyphicon-shopping-cart{
            position: absolute;
            top:95%;
            right:2%;
        }
        #background-profile{
            width: 100%;
            height:300px;
            background-color: black;
        }
        #pp-profile{
            margin-left: 43%;
            margin-top: 2%;
        }
        #pp-profile img{
            width:180px;
            height:175px;
            border-radius: 50%;
        }
        #profile-form label {
            padding-left: 400px;
        }
        #cart-box{
            position:relative;
            height:200px;
            width: 500px;
        }

        #cart-box span{
            position:absolute;
        }

        #cart-box #judul{
            top:0;
            left:0;
            font-weigt: bold;
            font-size: 28px;
        }
        #cart-box #harga{
            top:0;
            right:0;
            font-weigt: bold;
            font-size: 28px;
        }
        #cart-box #pcmac{
            top:30%;
            left:0;
            color:darkgrey;
        }
        #cart-box .glyphicon{
            top:30%;
            right:0;
        }

    </style>
</head>
<body id="app-layout">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b style="color: #ff6600">Orizin</b>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guest())
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/store') }}">Store</a></li>
                    @elseif (Auth::user()->role=='member')
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ url('/store') }}">Store</a></li>
                        <li><a href="{{ url('/myGame') }}">My Games</a></li>
                    @elseif (Auth::user()->role=='admin')
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ url('/managegame') }}">Manage Games</a></li>
                        <li><a href="{{ url('/manageuser') }}">Manage User</a></li>
                        <li><a href="{{ url('/managegenre') }}">Manage Genre</a></li>
                        <li><a href="{{ url('/transaction') }}">All Transaction</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @elseif (Auth::user()->role=='member')
                        <li><a href="">Hi, {{ Auth::user()->name }}</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="fa fa-user" style="background-color:transparent; color: grey;font-size: 15px;padding:0px; margin:0px"></span><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/cart') }}">Cart</a></li>
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @elseif (Auth::user()->role='admin')
                        <li><a href="">Hi, {{ Auth::user()->name }}</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="fa fa-user" style="background-color:transparent; color: grey;font-size: 15px;padding:0px; margin:0px"></span><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/transaction') }}">View Transactions</a></li>
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>
<footer>
    <center>
        &copy; 2017 Orizin<br>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
    </center>
</footer>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>