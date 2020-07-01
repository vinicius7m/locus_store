@extends('layouts.app')

@section('title', 'Produto')

@section('content')

<section class="bg-gray">
    <div class="container pt-5">
        <div class="bg-white rounded p-4">
        
            <div class="col-sm-6 float-right">
                <img src="{{ url('storage/products/'.$product->image) }}" class="img-fluid" alt="">
            </div>

            <h4>{{$product->name}} ({{$product->quantity}})</h4>
            <br>
            <div col="mt-5 col-sm-3">
                <p class="h3 lead text-justify">{{$product->description}}</p>
             
                <h3 class="lead">Marca: {{$product->brand}}</h3>
              
                <h2>R$ {{number_format($product->price, 2, ',', '.')}}</h3>
            
                <div class="text-center mt-5 row">
                
                    <form method="POST" action="{{ route('cart.add') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button style="width: 350px;" type="submit" class="btn shadow no-border-radius bg-orange btn-lg mr-1">Comprar</button>
                    </form>

                    <form method="POST" action="{{ route('cart.add') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">    
                        <button class="btn shadow no-border-radius text-orange btn-lg"><i class="fa fa-shopping-cart"></i></button>
                    </form>
                
                </div>
            </div>

        </div>
    </div>
</section>
@endsection