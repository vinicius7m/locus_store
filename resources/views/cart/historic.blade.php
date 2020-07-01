@extends('layouts.appFooter')

@section('title', 'Histórico de compras')

@section('content')

    <div class="container">
        
            <h4 class="mt-3">Minhas compras</h4>

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

            <h5>Compras concluídas</h5>
            @forelse ($shops as $order)
                <h5> Pedido: {{ $order->id }} </h5>
                <h5> Criado em: {{ $order->created_at->format('d/m/Y H:i') }} </h5>

                <form action="{{ route('cart.cancel') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $order->id }}"> 
                
                    <table class="table table-striped">
                        <thead class="bg-orange">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Produto</th>
                                <th scope="col">Valor Unit</th>
                                <th scope="col">Desconto(s)</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_order = 0;
                            @endphp

                            @foreach($order->order_products_itens as $order_product)
                            
                            @php
                                $total_product = $order_product->price - $order_product->discount;

                                $total_order += $total_product; 
                            @endphp


                            <tr>
                                <td class="text-center">
                                   @if($order_product->status == 'PA')
                                        <p class="text-center">
                                            <input type="checkbox" id="item-{{ $order_product->id }}" name="id[]" value="{{ $order_product->id }}">
                                            <label for="item-{{ $order_product->id }}">Selecionar</label>
                                        </p>
                                    @else 
                                        <strong class="text-red">Cancelado</strong>
                                    @endif
                                </td>
                                <td>
                                    <img width="75" height="75" src="{{ url('storage/products/'.$order_product->product->image) }}">
                                </td>
                        
                                <td> {{ $order_product->product->name }} </td>
                                <td> R$ {{ number_format($order_product->price, 2, ',', '.') }} </td>
                                <td> R$ {{ number_format($order_product->discount, 2, ',', '.') }} </td> 
                                <td> R$ {{ number_format($total_product, 2, ',', '.') }} </td>

                            </tr>

                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td><strong>Total do pedido</strong></td>
                                <td>R$ {{ number_format($total_order, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-lg btn-danger">
                                        Cancelar
                                    </button>
                                </td>
                                <td colspan="3"></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            @empty
                <h5 class="text-center">
                    @if($cancels->count() > 0)
                        Não há nenhum pedido no carrinho
                    @else
                        Você ainda não fez nenhuma compra
                    @endif
                </h5>
            @endforelse
   

    <h4 class="mt-5">Compras canceladas</h4>

            @forelse ($cancels as $order)
                <h5> Pedido: {{ $order->id }} </h5>
                
                <table class="table table-striped">
                    <thead class="bg-orange">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor Unit</th>
                            <th scope="col">Desconto(s)</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_order = 0;
                        @endphp

                        @foreach($order->order_products_itens as $order_product)
                        
                        @php
                            $total_product = $order_product->price - $order_product->discount;

                            $total_order += $total_product; 
                        @endphp

                        <tr>
                            <td>
                                <img width="75" height="75" src="{{ url('storage/products/'.$order_product->product->image) }}">
                            </td>
                    
                            <td> {{ $order_product->product->name }} </td>
                            <td> R$ {{ number_format($order_product->price, 2, ',', '.') }} </td>
                            <td> R$ {{ number_format($order_product->discount, 2, ',', '.') }} </td>        

                            <td> R$ {{ number_format($total_product, 2, ',', '.') }} </td>

                        </tr>

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Total do pedido</strong></td>
                            <td>R$ {{ number_format($total_order, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>

            @empty
                <h5 class="text-center text-secondary">
                    Nenhuma compra foi cancelada.
                </h5>
            @endforelse
    </div>


@endsection