@extends('layouts.appAdmin')

@section('content')
<h1>Criar produto</h1>
<form action="{{route('admin.products.product')}}" method="POST" enctype="multipart/form-data">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group">
        <label class="form-group" for="name">Nome do produto</label>
        <input class="form-control" type="text" name="name" id="name" required>
    </div>

    <div class="form-group">
        <label class="form-group" for="brand">Marca</label>
        <input class="form-control" type="text" name="brand" id="brand" required>
    </div>

    <div class="form-group">
        <label class="form-group" for="description">Descrição</label>
        <input class="form-control" type="text" name="description" id="description" maxlength="255" required>
    </div>

    <div class="form-group">
        <label class="form-group" for="price">Preço</label>
        <input class="form-control" type="text" name="price" id="price" required>
    </div>
    
    <div class="form-group">
        <label class="form-group" for="quantity">Quantidade</label>
        <input class="form-control" type="number" name="quantity" id="quantity" required>
    </div>

    <div class="form-group">
        <label class="form-group" for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" id="slug" required>
    </div>

    <div class="form-group">
        <label class="form-group" for="image">Imagem</label>
        <input class="form-control" type="file" name="image">
    </div>

    <div class="form-group">
        <label class="form-group" for="category">Categoria</label>
        <select name="category" id="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    
    <div>
        <input class="btn btn-primary btn-block mb-5" type="submit" value="Cadastrar">
    </div>

</form>
@endsection