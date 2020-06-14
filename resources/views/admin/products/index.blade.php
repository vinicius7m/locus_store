@extends('layouts.appAdmin');

@section('content')

<a href="{{route('admin.products.create')}}"><h1 class="mb-4">Criar produto</h1></a>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Produtos</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($products as $product)
           <tr> 
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->brand}}</td>
                <td>R$ {{$product->price}}</td>
                
                <td>
                    <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-sm btn-warning">Editar</a>
                    <a href="{{route('admin.products.destroy', ['product' => $product->id])}}" class="btn btn-sm btn-danger">Excluir</a>   
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$products->links()}}

@endsection