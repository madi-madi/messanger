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
    <style type="text/css">
    .message{
        background-color: #fff;
        min-height: 100px;
    }

    .message li.user{
        display: inline-block; 
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        cursor: pointer;
        background-color: rgba(158, 158, 158, 0.15);
        margin-bottom: 4px;
    }

    .message li.user:hover{
        background-color: rgba(158, 158, 158, 0.5);
    }

    .message li.user p{
        margin-bottom: unset;
        margin-left: 12px;
    }

    .message li.user img{
        border-radius: 50%;
        border-radius: 50%;
        margin-right: 10px;
        margin-left: 10px;
        margin-top: 5px;
    border: 3px solid #fff;
    border-bottom-color: #FFC107;
    border-top-color: #f00;
    border-left-color: #4CAF50;
    border-right-color: #111;
    }

.col-md-12 img {
    margin-right: 10px;
    border-radius: 50%;
    border: 3px solid #fff;
    border-bottom-color: #FFC107;
    border-top-color: #f00;
    border-left-color: #4CAF50;
    border-right-color: #111;
}

span.user-from {
    float: right;
}

.col-md-12.from, .to {
    clear: both;
}

/***/
        div.overlay{
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height:100%;
            z-index: 99999;
            background-color: rgba(0,0,0,0.37);
        }

        div.overlay div.content-modal{
            width: 25%;
            min-height:150px;
            background-color:;
            margin: auto;
            transform: translateY(160%);
        }

        div.content-modal div.modal-header{

            width: 100%;
            background-color: #cccaca;
            padding: 5px 0;
            position: relative;
        }

        div.content-modal div.modal-footer{

            width: 100%;
            background-color: #e0dddd;
            padding: 5px 0;
            position: relative;
            min-height: 30px;
        }
        div.content-modal div.modal-content{

            width: 100%;
            min-height: 100px;
        }

        div.content-modal div.modal-header span.modal-cancel{
            position: absolute;
            right:5%;
            color: #fff;
            cursor: pointer;
            font-stretch: condensed;
        }

        div.modal-footer span.confirm{
            position: absolute;
            right: 5%;
            display: inline-block;
        }

        span.confirm button{
            cursor: pointer;
        }
</style>
</head>
<body>
    <div id="">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else

                            <li class="nav-item ">
                                <a class="nav-link " href="{{url('/profile/'.Auth::user()->name.'/'.Auth::user()->id)}}" role="button">
                                  {{Auth::user()->name}}
                                </a>

                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{url('/messages')}}" role="button">
                                  Messages
                                </a>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{url('storage/'.Auth::user()->image)}}" width="30px"  alt="{{ Auth::user()->name }}" style="border-radius: 50%;"/>
                                    <!-- {{ Auth::user()->name }}  --><span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
