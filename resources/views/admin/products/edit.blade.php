@extends('layouts.appAdmin')

@section('content')
<h1>Editar categoria</h1>
<form action="{{route('admin.products.update', ['product' => $product->id])}}" method="POST">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group">
        <label class="form-group" for="name">Nome da Categoria</label>
        <input class="form-control" type="text" name="name" id="name" value="{{$product->name}}">
    </div>

    <div class="form-group">
        <label class="form-group" for="brand">Marca</label>
        <input class="form-control" type="text" name="brand" id="brand" value="{{$product->brand}}">
    </div>

    <div class="form-group">
        <label class="form-group" for="description">Descrição</label>
        <input class="form-control" type="text" name="description" id="description" value="{{$product->description}}">
    </div>

    <div class="form-group">
        <label class="form-group" for="price">Preço</label>
        <input class="form-control" type="text" name="price" id="price" value="{{$product->price}}">
    </div>
    
    <div class="form-group">
        <label class="form-group" for="quantity">Quantidade</label>
        <input class="form-control" type="number" name="quantity" id="quantity" value="{{$product->quantity}}">
    </div>

    <div class="form-group">
        <label class="form-group" for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" id="slug" value="{{$product->slug}}">
    </div>

    <div class="form-group">
        <label class="form-group" for="image">Imagem</label>
        <input class="form-control" type="file" name="image" value="$product->image">
        <img class="col-4" src="{{ url('storage/products/'.$product->image) }}">
    </div>

    <div>
        <input class="btn btn-primary btn-block mb-5" type="submit" value="Atualizar">
    </div>

</form>
@endsection