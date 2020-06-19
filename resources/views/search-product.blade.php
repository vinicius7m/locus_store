@extends('layouts.app')

@section('title', 'Pesquisa produto')

@section('content')

<div class="container">
    <h4 class="mt-5">Resultados sobre "{{ $term['name'] }}"</h4>
    
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 pt-3">
                
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
        @empty
            <h5>Nenhum produto encontrado! :(</h5>
        @endforelse
    </div>
</div>

    @if(isset($filters))
        {!! $products->appends($filters)->links() !!}
    @else
        {!! $products->links() !!}
    @endif  

@endsection