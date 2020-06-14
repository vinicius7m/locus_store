@extends('layouts.appAdmin')

@section('content')

<a href="{{route('admin.categories.create')}}" class=""><h1 class="mt-4 mb-4">Criar categoria</h1></a>   

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Categorias</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                
                <td>
                    <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-warning">Editar</a>
                    <a href="{{route('admin.categories.destroy', ['category' => $category->id])}}" class="btn btn-danger">Excluir</a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

{{$categories->links()}}


@endsection
