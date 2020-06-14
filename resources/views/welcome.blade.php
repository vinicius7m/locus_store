@extends('layouts.app')

@section('title', 'Locus Sports')

@section('content')
    <section class="banner">
        <a href="{{url('/products')}}">
            <img src="{{ asset('img/banner.jpeg') }}" alt="" class="img-fluid w-100">
        </a>
    </section>
    
    <section class="top-products">
        <div class="container">
        <h1 class="mt-3 mb-3 pt-2 pb-2"><b>MAIS VENDIDOS</b></h1>
        <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 pt-3">
                
                <a href="">
                <div class="card border-0">
                    
                <img class="card-img-top" src="{{ url('storage/products/'.$product->image) }}" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-left text-secondary">{{$product->name}}</h5>
                        <h5 id="espaco" class="card-title text-center text-dark">R$ {{$product->price}}</h5>
                                    
                        <a type="button" id="preto" class="btn bg-orange btn-block" href="{{ url("products/$product->id/view") }}">
                            Visualizar
                        </a>
                    </div>
                </div>
                </a>
                
            </div>
            @endforeach
                
            </div>
            
        </div>

    </section>

    <hr>
    
    <section class="new-product pt-2 pb-2">
        <div class="container">
            <h1 class="mb-3 pb-2">LANÇAMENTO!!!</h1>
            
            <div class="row">
                @foreach($productsone as $productone)
                <div class="col-sm-5"> 
                    <div class="image float-left">
                        <img class="img-fluid" src="{{ url('storage/products/'.$productone->image) }}" alt="">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="py-5 mx-5 float-right">
                        <h2 class="title">{{$productone->name}}</h2>
                        <div class="text-right my-3">
                            <h4 class="lead text-center mt-3">{{$productone->description}}</h4>
                            
                            <a href="{{ url("products/$productone->id/view") }}" class="btn bg-orange btn-lg mt-3 col-6">Saber mais ></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>    
    </section>
@endsection