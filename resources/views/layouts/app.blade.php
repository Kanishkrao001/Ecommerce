<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" 
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>

    <style>
        .navb {
            background-color: hsl(34, 78%, 95%);
            font-weight: bold;
            margin: 7px;
        }
        .brand {
            font-size: 40px;
            font-family: cursive;
            color: coral !important;
            animation: animate 1.5s linear infinite;
        }
        @keyframes animate{
            0% {
                opacity: 0.1;
            }
            50% {
                opacity: 0.8;
            }
            100%{
                opacity: 0.1;
            }
        }
        .cust {
            color: blueviolet;
            font-size: large;
            font-family: cursive;
        }
        .anch {
            /* float: right; */
            margin-top: 9%;
            /* margin-right: 15%; */
            background-color: cornsilk;
            color: tomato;
            text-decoration: none;
            /* border: 0.8px solid black; */
            border-radius: 10px;
        }
        .anch a:hover {
            color:blue; 
            text-decoration:none; 
            cursor:pointer;  
        }
        .imag {
            height: 170px;
            width: 160px;
        }
        .imagg {
            height: 60px;
            width: auto;
        }
        .items {
            /* display: flex;
            text-align: center;
            justify-content: space-evenly;
            border-bottom: 1px dashed; */
            float: left;
            width: 22%;
            border: 1px solid lightgray;
            border-radius: 12px;
  
            margin: 10px;
            padding: 14px;
        } 
        .desc {
            display: flex;
            margin: 6px;
            align-items: center;
        }
        .element {
            
            /* font-weight: bolder; */
            font-size: 17px;
        }
        /* .element-1 {
            display:flex;
            justify-content: space-between;
        } */
        #p1 {
            font-weight: bold;
        }
        .carousel-caption {
            left: 20% !important;
            color: blue;
        }
        .item {
            background-color: linen;
        }
        img.imgg {
            height: 400px !important;
            width: 37%;
        }
        .row {
            width: 80%;
            /* margin: 4px 4px 4px 39px; */
            margin-top: 30px;
            margin-left: 8%;
        } 
        .clm2 {
            margin-top: 45px;
            margin-right: 40%;
        }
        .con2 {
            margin-right: 10%;
        }
        .con2_1 {
            width: max-content;
        }
        .cate {
            display: flex;
            justify-content: space-evenly;
            background-color: azure;
        }
        .mob {
            color:white ;
            background-color: beige;
            border: 1px solid grey;
            padding: 7px;
            border-radius: 4px;
        }
        .mob a {
            color: darkmagenta;
            text-decoration: none;
        }
        .mob a:hover {
            color:blue; 
            text-decoration:none; 
            cursor:pointer;  
        }
        .lap {
            color: red ;
            background-color: purple;
            border: 3px dashed;
        }
        .wat {
            color: red ;
            background-color: purple;
            border: 3px dashed;
        }
        .upper {
            float: left;
            width: 35%;
            background-color: azure;
            margin-top: 2%;
            font-size: 20px;  
            font-style: oblique;
            font-family: math;
            padding: 20px;
        }
        .head {
            /* margin-right: 3px; */
            font-weight: bolder;
            text-align: center;
            font-size: xx-large;
        }
        .con {
            display: flex;
            justify-content: space-evenly;
            width: 110%;
            border: 1px solid black;
            margin-right: 60px;
            margin-left: 15%;
            background-color: aliceblue;
            border-radius: 47px;
        }
        .first {
            /* border: 2px dashed red; */
            margin: 8px;
            font-weight: bold;
            padding: 3px;
            font-style: oblique;
            font-family: math;
 
        }
        .second {
            /* border: 2px dashed green; */
            margin: 8px;
            font-weight: bold;
            padding: 3px;
            font-style: oblique;
            font-family: math;
        }
        .third {
            margin: 8px;
        }
        .checkout {
            float: right;
            width: 20%;
            margin-top: 54px;
            background-color: floralwhite;
            margin-right: 35px;
        }
        .h {
            font-weight: bolder;
            font-style: italic;
        }
        .details {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .btn1 {
            display: block;
            width: 100%;
            border: none;
            background-color: black;
            color: white;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
        .payment {
            float: right;
            margin: 10px;
        }
        .whole {
            display: flex;
            justify-content: space-around;
            font-family: cursive;
            font-weight: bold;
        }
        .order {
            display: flex;
            justify-content: space-around;
            width: 50%;
            margin-bottom: 10px;
        }
       .search {
           margin-top: 9px;
       }
       .details1 {
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-bottom: 0.1px dotted ;
            margin: 15px;
        }
        .imagg-1 {
            height: 60px;
        }
        .overall {
            display: flex;]
            align-items: center;
        }
        .left {
            width: 15%;

        }
        .right {
            width: 15%;
        }
        .all {
            width: 70%;
        }
        .gap {
            margin-bottom: 15px;
            border-radius: 16px;
            width: 55%;
        }
        .all-1 {
            display: flex;
            justify-content: space-around;
        }
        .wrap {
            width: 65%;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navb">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <div class="navbar-header search">
                        <form class="form-inline" action="/search" method="GET">
                            <input class="form-control " type="text" placeholder="Search" name="query">
                            <button class="btn btn-outline-success " type="submit">Search</button>
                        </form>
                    </div>
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="nav navbar-nav">
                        &nbsp;
                        <ul class="nav navbar-nav cust">
                            &nbsp; 
                             @if (!Auth::guest())
                            <li><a href='/Mobiles'>Mobiles</a></li>
                            <li><a href="/Laptops">Laptops</a></li>
                            <li><a href="/Watches">Watches</a></li>
                           
                            @endif
                         </ul>
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right cust">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="/{{ Auth::id() }}/cart">Cart</a></li>  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="/{{ Auth::id() }}/profile">My Profile</a>

                                        <form action="/{{ Auth::id() }}/profile" method="GET" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="/{{ Auth::id() }}/cart_history">My Orders</a>

                                        <form action="/{{ Auth::id() }}/cart_history" method="GET" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
