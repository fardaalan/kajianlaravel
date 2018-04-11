<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Daily Events</title>
    @yield('css')
    <style>



    </style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Daily Events</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
        </li>
        @if(Auth::check() && Auth::user()->hasRole('admin'))
        <li class="nav-item">
        <a class="nav-link" href="/admin">Panel Admin</a>
        </li>
        @endif
        @if(Auth::check() && Auth::user()->hasRole('member'))
        <li class="nav-item">
        <a class="nav-link" href="/users">Panel Users</a>
        </li>
        @endif
    </ul>
    <!-- Right Side Of Navbar -->

    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
            <li><a class="btn btn-md btn-primary" href="{{ route('login') }}">Login</a></li>&nbsp
            <li><a class="btn btn-md btn-outline-success" href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a class="btn btn-md btn-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
    </ul>
    </div>
    </nav>
    <!-- End Navbar -->
    @yield('header')
    @yield('content')
    <footer class="jumbotron bg-light" style="margin-bottom: 0px; color: grey">
        <div class="row">
            <div class="col-lg-6">
            © Copyright SANTREN KODING 2018
            </div>
            <div class="col-lg-6 text-right">
               <a href="" class="btn btn-outline-primary"> back to top </a>
            </div>
        </div>
    </footer>
    <!-- Javascript -->
    @yield('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- End Javascript -->
</body>
</html>
