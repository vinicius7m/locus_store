        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="d-flex container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

                <div class="mx-auto d-flex justify-content-center">
                    <a class="navbar-brand justify-content-center" href="{{ url('/') }}">
                        <img src="{{asset('img/locus_logo.png')}}" width="40" height="30" class="img-fluid">
                    </a>    
                </div>

                <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarSupportedContent">
                <form class="form-inline mx-auto my-2 mr-lg-5" action="{{ route('products.search') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <input type="text" class="input-t form-control pr-5 no-border-radius" name="name" placeholder="Buscar produto..." required>
                        
                        <span class="input-group-btn">
                            <button class="btn rounded-right bg-orange no-border-radius" type="submit"><i class="p-1 fa fa-search"></i></button>
                        </span>
                    </div>
                </form>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Produtos</a>
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
                        <a class="nav-link" href="{{ route('cart.index') }}"><i class="p-1 fa fa-shopping-cart fa-2x"></i></a>
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
                        <a class="dropdown-item bg-orange" href="{{ route('profiles.user.index', ['user' => Auth::user()->id ]) }}">
                            Perfil
                        </a>
                        <a class="dropdown-item bg-orange" href="{{ route('cart.shop') }}">
                            Histórico de compra
                        </a>
                        <a class="dropdown-item bg-orange" href="{{ route('logout') }}"
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