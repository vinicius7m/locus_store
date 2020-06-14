@extends('layouts.app')

@section('title', 'Produto')

@section('content')

<section class="bg-gray">
    <div class="container pt-5">
        <div class="bg-white p-4">
           
            
            <div class="col-sm-7 float-right border">
                <img src="{{ url('storage/products/'.$product->image) }}" class="img-fluid" alt="">
            </div>

            <h4>{{$product->name}} ({{$product->quantity}})</h4>
            <br>
            <div col="mt-5 col-sm-3">
                <p class="h3 lead">{{$product->description}}</p>
             
                <h3 class="lead">Marca: {{$product->brand}}</h3>
              
                <h2>R$ {{$product->price}}</h3>
            
                <div class="text-center mt-5">
                    <a href="" class="btn bg-orange btn-lg col-4">Comprar</a>   
                    <a href="" class="btn text-orange btn-lg"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection