@extends('layouts.app')

@section('title', 'Finalizar pagamento')

@section('content')
<div class="container">
    @forelse ($orders as $order)

    <h4 class="mt-5 mb-3 ml-4"> Finalizar pagamento </h4>

    <div class="row mx-auto col-12">

    @php
        $total_order = 0
    @endphp
    
    <div class="col-6">
    
    <form method="POST" action="{{ route('cart.finish') }}">
        {{ csrf_field() }}
        <input type="hidden" name="order_id" value="{{ $order->id }}">

        <div class="form-row border p-3 rounded mb-3">

            <div class="col-6">
                <label for="name">Nome</label>
                <input type="text" name="name" class="input-t mb-2" id="name" placeholder="Ex: Vinícius" required>
            </div>
            <div class="col-6">
                <label for="surname">Sobrenome</label>
                <input type="text" name="surname" class="input-t mb-2" id="surname" placeholder="Ex: Moreira" required>
            </div>
            
            <div class="col-6">
                <label for="card">Cartão</label>
                <input type="text" name="card" class="input-t mb-2" id="card" placeholder="Ex: 1111-1111-1111-1111" required>
            </div>
            <div class="col-4">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" class="input-t mb-2" id="cpf" placeholder="Ex: 123.123.123-10" required>
            </div>
            <div class="col-2">
                <label for="cod">Cód</label>
                <input type="text" name="cod" class="input-t mb-2" id="cod" placeholder="Ex: 111" required>
            </div>

            <div class="col-12">
                <label for="address">Endereço</label>
                <input type="text" name="address" class="input-t mb-2" id="address" placeholder="Ex: Rua Osvaldo Cunha, Casa 123, Jereissati II" required>
            </div>
            
            <div class="col-4 c">
                <label for="state">Estado</label>
                <input type="text" name="state" class="input-t" id="state" placeholder="Ex: CE, PA, SP" required>
            </div>
            <div class="col-4 mb-3">
                <label for="city">Cidade</label>
                <input type="text" name="city" class="input-t" id="city" placeholder="Ex: Fortaleza" required>
            </div>
            <div class="col-4 mb-3">
                <label for="cep">CEP</label>
                <input type="text" name="cep" class="input-t" id="cep" placeholder="Ex: 10000-123" required>
            </div>
            
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                    Concordo com os <u>Termos de Uso</u>
                </label>
                </div>
            </div>

        </div>

    <h5>Detalhes do pedido</h5>
    
    @foreach($order->order_products as $order_product)

    @php
        $total = $order_product->prices;
        $discounts = $order_product->discounts;
            
        $total_product = $order_product->prices - $order_product->discounts;

        $total_order += $total_product;
    @endphp

    <div>
        <td>
            <img width="70" height="70" src="{{ url('storage/products/'.$order_product->product->image) }}">
        </td>
        <td> ({{ $order_product->quantity }}) {{ $order_product->product->name }} </td>
        <td> R$ {{ number_format($total_product, 2, ',', '.') }} </td>
    </div>

    @endforeach
    </div>

    <div class="col-5 mx-auto">
    <div class="border p-4">
        <div>
        
            <h4>Resumo</h4>

                <div class="d-flex bd-highlight">
                    <div class="mr-auto p-2 bd-highlight">Preço:</div>
                    <div class="p-2 bd-highlight">R$ {{ number_format($total_order, 2, ',', '.') }}</div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="mr-auto p-2 bd-highlight">Desconto:</div>
                    <div class="p-2 bd-highlight"><s>-R$ {{ number_format($discounts, 2, ',', '.') }}</s></div>
                </div>


            </div>

            <hr>

            <div class="d-flex bd-highlight">
                <div class="mr-auto p-2 bd-highlight"><strong>Total:</strong> </div>
                <div class="p-2 bd-highlight"><strong class="h5">R$ {{ number_format($total_order, 2, ',', '.') }}</strong></div>
            </div>

            <!-- <form method="POST" action="{{ route('cart.finish') }}">
                {{ csrf_field() }}
                <input type="hidden" name="order_id" value="{{ $order->id }}"> -->
                <center><button type="submit" class="btn btn-block bg-orange">Comprar</button></center>
            </form>
        </div>

            

    </div>
    </div>
    @empty
    <h5>Não há nenhum pedido no pagamento</h5>
    @endforelse
    </div>
</div>

@endsection