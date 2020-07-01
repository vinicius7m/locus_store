<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Links CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- Links locais -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('img/locus_logo.png') }}">


    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    
    @include('menus.menuNavbar')
  
    @yield('content')
    
    
    <footer class="page-footer font-small pt-4 bg-footer-foreground">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left pt-3">

            <!-- Grid row -->
            <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">Locus Esportes</h5>
                <p>
                    Nossa loja oferece o que há de mais moderno e atual em todas as categorias de produtos. 
                    Desde o princípio, nossa preocupação é oferecer os melhores produtos com os melhores preços 
                    aliado a um ótimo atendimento a você cliente.
                </p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled">
                <li>
                    <a class="text-gray" href="{{ url('/products') }}">Produtos</a>
                </li>
                <li>
                    <a class="text-gray" href="{{ url('/contact') }}">Contate-nos</a>
                </li>
                <li>
                    <a class="text-gray" href="{{ url('/who-are-we') }}">Quem somos</a>
                </li>
                
                </ul>

            </div>

            <div class="col-md-3 mb-md-0 mb-3">
              
            <h5 class="text-uppercase">Siga-nos</h5>
                <a href="https://www.facebook.com/pages/Professora-Luiza-de-Teodoro-Vieira-EEEP/981208075246153" target="_blank">
                    <i class="text-gray fa fa-facebook fa-3x mr-3"></i>
                </a>
            
                <a href="https://www.instagram.com/eeep_ltvgremio/?hl=pt-br" target="_blank" >
                    <i id="icon" class="text-gray fa fa-instagram fa-3x mr-3"></i>
                </a>
            
                <a href="https://www.linkedin.com/in/vin%C3%ADcius-moreira-83930319b/?challengeId=AQGsGtZjcR_59AAAAXMImM-deWzwonCSfZb_8GNaGFpe1G5sTSxz6b6fy6sb2w8oUE8ctDK0Dgj3QOOvthp_7ZTWaEmxUkjTFA&submissionId=d73b7ba4-ed85-1d16-21f0-001a3c21c73cg" target="_blank">
                    <i id="icon" class="text-gray fa fa-linkedin fa-3x mr-3"></i>
                </a>      
                <a href="https://github.com/vinicius7m" target="_blank">
                    <i class="text-gray fa fa-github-alt fa-3x mr-3"></i>
                </a>
            </div>
            <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 bg-footer-background">© 2020 Copyright:
            <a class="text-gray" href="{{ url('/') }}"> Locussports.com</a>
        </div>
        <!-- Copyright -->

        </footer> 
    
    <!-- Links locais -->
    <script src="{{ asset('js/cart.js') }}"></script>
    <!-- Links CDN -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>