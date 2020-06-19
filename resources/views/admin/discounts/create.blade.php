@extends('layouts.appAdmin')

@section('content')
<h1>Criar desconto</h1>
<form action="{{route('admin.discounts.discount')}}" method="POST">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-row">

        <div class="form-group col-md-6">
            <label class="form-group" for="">Nome do desconto</label>
            <input class="form-control" type="text" name="name" id="">
        </div>

        <div class="form-group col-md-6">
            <label class="form-group" for="">Localização</label>
            <input class="form-control" type="text" name="locator" id="">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-6">
            <label class="form-group" for="">Desconto</label>
            <input class="form-control" type="text" name="discount" id="">
        </div>

        <div class="form-group col-md-6">
            <label class="form-group" for="">Modo de desconto</label>
            <select name="discount_mode" class="custom-select mr-sm-2" id="">
                <option value="value">Valor</option>
                <option value="perc">Porcentagem</option>
            </select>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-6">
            <label class="form-group" for="">Limite</label>
            <input class="form-control" type="text" name="limit" id="">
        </div>

        <div class="form-group col-md-6">
            <label class="form-group" for="">Modo de limite</label>
            
            <select class="custom-select mr-sm-2" name="limit_mode" id="">
                <option value="value">Valor</option>
                <option value="quantity">Quantidade</option>
            </select>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-6">
            <label class="form-group" for="">Data e Hora de Validade</label>
            <input class="form-control" type="datetime-local" name="dthr_validade" id="">
        </div>

        <div class="form-group col-md-6">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ativo" id="ativo1" value="S">
                <label class="form-check-label" for="ativo1">S</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ativo" id="ativo2" value="N">
                <label class="form-check-label" for="ativo2">N</label>
            </div>
        </div>

    </div>

    <div class="text-center">
        <input class="btn btn-primary col-md-6 mb-5" type="submit" value="Cadastrar">
    </div>

</form>
@endsection