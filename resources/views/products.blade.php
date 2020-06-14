@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="container-fluid mt-5">
    
    <div class="col-sm-3 float-left text-center border">
        <h4>Categorias</h4>

        @foreach($categories as $category)
            <a class="lead text-decoration-none text-secondary" href="">{{$category->name}}</a> <br>
        @endforeach

    </div>

    <div class="row col-sm-9 float-right">        
    
        @foreach($products as $product)

            <div class="col-sm-3 pt-3">
                
                <a href="{{ url("products/$product->id/view") }}">
                <div class="card border-0">
                    
                <img class="card-img-top" src="{{ url('storage/products/'.$product->image) }}" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-left text-secondary">{{$product->name}}</h5>
                        <h5 id="espaco" class="card-title text-left text-dark">R$ {{$product->price}}</h5>
                                    
                        <a href="{{ url("products/$product->id/view") }}" class="btn bg-orange btn-block">
                            Visualizar
                        </a>
                    
                    </div>
                </div>
                </a>
                
            </div>
    
    @endforeach
    </div>

</div>
{{$products->links()}}
@endsection