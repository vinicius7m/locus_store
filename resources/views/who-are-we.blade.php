@extends('layouts.app')

@section('title', 'Quem somos')

@section('content')

    <div class="container">
        <div class="col-sm-6 float-left">
            <img src="{{ asset('img/quem-somos.png') }}" style="width: 500px; height: 580px;">
        </div>

        <section class="qsomos col-sm-5 pt-5 float-right">
            
            <h3>Quem somos?</h3>

            <h5 class="lead text-justify">
                <p>
                Somos uma loja online que oferece o melhor para os nossos clientes, onde podemos atender todas as expectativas sobre artigos esportivos sempre de olho em equipamentos modernos e lançamentos.
                Nossa loja oferece o que há de mais moderno e atual em todas as categorias de produtos.
                Desde o princípio, nossa preocupação é oferecer os melhores produtos com os melhores preços aliado a um ótimo atendimento a você cliente, que é a pessoa mais importante para nós.
                </p>
            </h5>
            

            <div class="text-right">
                <a style="color: #ffffff;" class="btn bg-orange btn-lg" href="/products">Conheça nossos produtos →</a>

            </div>
        </section>
    </div>


    
    
    

@endsection