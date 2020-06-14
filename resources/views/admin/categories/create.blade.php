@extends('layouts.appAdmin')

@section('content')
<h1>Criar categoria</h1>
<form action="{{route('admin.categories.category')}}" method="POST">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group">
        <label class="form-group" for="name">Nome da Categoria</label>
        <input class="form-control" type="text" name="name" id="name">
    </div>

    <div class="form-group">
        <label class="form-group" for="description">Descrição</label>
        <input class="form-control" type="text" name="description" id="description">
    </div>

    <div class="form-group">
        <label class="form-group" for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" id="slug">
    </div>

    <div>
        <input class="btn btn-primary btn-block mb-5" type="submit" value="Cadastrar">
    </div>

</form>
@endsection