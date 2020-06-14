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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="">
        <img src="{{ asset('img/logo.png') }}" width="40" height="30" class="img-fluid">
    </a>   

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
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
                <a class="nav-link" href="{{ url('/contact') }}">Usuários</a>
            </li> 
        </ul>
    </div>
</nav>    


    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>