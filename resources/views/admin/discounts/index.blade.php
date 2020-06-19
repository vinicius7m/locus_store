@extends('layouts.appAdmin')

@section('content')

<a href="{{route('admin.discounts.create')}}" class="text-dark"><h1 class="mt-4 mb-4">Criar desconto</h1></a>   

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Descontos</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($discounts as $discount)
            <tr>
                <td>{{$discount->id}}</td>
                <td>{{$discount->name}}</td>
                
                <td>
                    <a href="{{route('admin.discounts.edit', ['discount' => $discount->id])}}" class="btn btn-warning">Editar</a>
                    <a href="{{route('admin.discounts.destroy', ['discount' => $discount->id])}}" class="btn btn-danger">Excluir</a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

{{$discounts->links()}}


@endsection
