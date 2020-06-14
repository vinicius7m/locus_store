<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse container-fluid" id="navbarTogglerDemo01">
   
    <form class="form-inline my-2 mr-lg-5">
        <input type="text" class="form-control" name="x" placeholder="Search term...">
        
        <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="p-1 fa fa-search"></i></button>
        </span>
    </form>

    <a class="navbar-brand mx-auto" href="">
        <img src="assets/img/logo.png" width="40" height="30" class="img-fluid">
    </a>   

    <ul class="navbar-nav ml-lg-n5">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/products') }}">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/who-are-we') }}">Quem somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/contact') }}">Contato</a>
    </li>
      
    </ul>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/shopping-cart') }}"><i class="p-1 fa fa-shopping-cart fa-2x"></i></a>
        </li>    
    </ul>
    
    <!-- <button class="btn btn-light" href="modal">Login</button> -->
    <!-- <button class="btn btn-outline-dark" href="modal">Cadastro</button> -->
    
  </div>
</nav>