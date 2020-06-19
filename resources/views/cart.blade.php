@extends('layouts.app')

@section('title', 'Carrinho de compra')

@section('content')

    <div class="container">
        <div class="">
            <h4 class="mt-5">Carrinho de compra</h4>

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

            
            @forelse ($orders as $order)
                <h5> Pedido: {{ $order->id }} </h5>
                

                <table class="table table-striped">
                    <thead class="bg-orange">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Qtd</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor Unit</th>
                            <th scope="col">Desconto(s)</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
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
                                Retirar produto
                                </a>   

                            </td>

                            <td> {{ $order_product->product->name }} </td>
                            <td> R$ {{ number_format($order_product->product->price, 2, ',', '.') }} </td>
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

                <div class="pull-right mt-2 mr-3">
                    <div class="row mb-3">
                        <strong>Total do pedido: </strong>
                        <span> R$ {{ number_format($total_order, 2, ',', '.') }}</span>
                    </div>

                    <div>
                        <form action="{{ route('cart.discount') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <strong>Cupom de desconto: </strong>
                            <input type="text" name="cupon" class="form-control">
                            <button class="btn bg-orange">Validar</button>
                        </form>
                    </div>

                    <div class="row">
                        <a class="btn bg-orange btn-lg text" href="{{ url('/products') }}">Continuar comprando <i class="fa fa-reply"></i> </a>

                        <form method="POST" action="{{ route('cart.finish') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <button type="submit" class="btn btn-lg bg-orange">Finalizar compra</button>
                        </form>

                    </div>
                </div>

            @empty
                <h5>Não há nenhum pedido no carrinho</h5>
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