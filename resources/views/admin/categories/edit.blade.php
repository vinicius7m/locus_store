@extends('layouts.appAdmin')

@section('content')
<h1>Editar categoria</h1>
<form action="{{route('admin.categories.update', ['category'=>$category->id])}}" method="POST">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group">
        <label class="form-group" for="name">Nome da Categoria</label>
        <input class="form-control" type="text" name="name" id="name" value="{{$category->name}}">
    </div>

    <div class="form-group">
        <label class="form-group" for="description">Descrição</label>
        <input class="form-control" type="text" name="description" id="description" value="{{$category->description}}">
    </div>

    <div class="form-group">
        <label class="form-group" for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" id="slug" value="{{$category->slug}}">
    </div>

    <div>
        <input class="btn btn-primary" type="submit" value="Editar">
    </div>

</form>
@endsection