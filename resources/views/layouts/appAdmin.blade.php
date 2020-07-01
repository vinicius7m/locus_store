<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('img/logo_orange.png') }}">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="d-flex container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

                <div class="">
                    <a class="navbar-brand justify-content-center" href="{{ url('/') }}">
                        <img src="{{asset('img/logo.png')}}" width="40" height="30" class="img-fluid">
                    </a>    
                </div>



                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/admin') }}">Home <span class="sr-only">(Página atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/products/') }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/categories') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.discounts.index') }}">Descontos</a>
                </li> 
                    
                </ul>
                
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="btn bg-orange" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    
                    <li class="nav-item">
                        <a class="btn btn-light" href="{{ route('register') }}">{{ __('Cadastro') }}</a>
                    </li>
                    
                    @endif
                    
                    @else

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                    <div class="dropdown-menu dropdown-menu-right bg-orange" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
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


    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <!-- <script src="{{ asset('js/cart.js') }}"></script> -->
    <!-- Links CDN -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>