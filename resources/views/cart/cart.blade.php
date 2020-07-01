@extends('layouts.app')

@section('title', 'Carrinho de compra')

@section('content')

    <div class="container mt-3">

        <br>
        @if(Session::has('success-message'))
            <div class="alert alert-success">
                <strong>{{ Session::get('success-message') }}</strong>
            </div>
        @endif

        @if(Session::has('fail-message'))
            <div class="alert alert-danger">
                <strong>{{ Session::get('fail-message') }}</strong>
            </div>
        @endif

        <div class="row">
        
            

            
            @forelse ($orders as $order)
                <div class="col-8">
                <h5> Pedido: {{ $order->id }} </h5>
                

                <table class="table">
                    
                    <tbody>
                        @php
                            $total_order = 0
                        @endphp

                        @foreach($order->order_products as $order_product) 
                        <tr>
                            <td>
                                <img width="75" height="75" src="{{ url('storage/products/'.$order_product->product->image) }}">
                            </td>
                            <td>
                                <div class="align-content-center">
                                    <a class="text-orange-no-border" onclick="cartDeleteProduct( {{ $order->id }}, {{ $order_product->product_id }}, 1)" href="#"><i class="fa fa-minus-circle"></i></a>
                                    <span>{{ $order_product->quantity }}</span>
                                    <a class="text-orange-no-border" onclick="cartAddProduct({{ $order_product->product_id }})" href="#"><i class="fa fa-plus-circle"></i></a>
                                </div>
                                <a class="text-orange-no-border" onclick="cartDeleteProduct( {{ $order->id }}, {{ $order_product->product_id }}, 0)" href="#" data-delay="50" data-position="right">
                                Excluir
                                </a>   
                            </td>
                            <td> {{ $order_product->product->name }} </td>
                            <td> R$ {{ number_format($order_product->discounts, 2, ',', '.') }} </td>
                            @php
                                $total_product = $order_product->prices - $order_product->discounts;

                                $total_order += $total_product; 
                            @endphp
                            <td> R$ {{ number_format($total_product, 2, ',', '.') }} </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>

                <a class="btn bg-orange pull-right" href="{{ url('/products') }}">Continuar comprando <i class="fa fa-reply"></i> </a>
                
                </div>

                <div class="col-4 mt-5">
                    <div>
                        <span class="lead">Total do pedido: </span> <br>
                        <h2> R$ {{ number_format($total_order, 2, ',', '.') }}</h2>
                    </div>            
                    
                    <form method="POST" action="{{ route('cart.payment') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <button type="submit" class="btn mb-3 col-10 no-border-radius bg-orange">Finalizar compra</button>
                    </form>
                        
                    <form class="form-inline" action="{{ route('cart.discount') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="text" name="cupon" class="input-t no-border-radius col-7" placeholder="Cupom de desconto">
                        <button class="btn text-orange no-border-radius col-3">Validar</button>
                    </form>
                </div>

            @empty
                <h5 class="text-secondary">Não há nenhum produto no carrinho, adicione um indo para "Produtos"</h5>
            @endforelse
            </div>
    </div>

    <form id="form-delete-product" method="POST" action="{{ route('cart.delete') }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        
        <input type="hidden" name="order_id">
        <input type="hidden" name="product_id">
        <input type="hidden" name="item">
    </form>

    <form id="form-add-product" method="POST" action="{{ route('cart.add') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id">
    </form>


@endsection