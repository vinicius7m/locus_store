@extends('layouts.app')

@section('title', 'Editar perfil')

@section('content')
<style>
    body {
        background-color: #e2e2e2;
    }
</style>
    
    <div class="container">
        <div class="col-md-5 bg-white rounded mx-auto mt-5">
            
            <form action="{{ route('profiles.user.update', ['user' => Auth::user()->id]) }}" method="POST" class="p-3">
                <h2 class="text-center mb-3">Editar perfil</h2>
                <div class="form-group row">
                    
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <label for="" class="col-sm-2 col-form-label col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input name="name" type="text" class="form-control form-control" id="" value="{{ Auth::user()->name }}" required>
                    </div>

                    <label for="" class="col-sm-2 col-form-label col-form-label mt-3">Email</label>
                    <div class="col-sm-10">
                        <input name="email" type="email" class="form-control form-control mt-3" id="" placeholder="" value="{{ Auth::user()->email }}" required>
                    </div>

                    <label for="" class="col-sm-2 col-form-label col-form-label mt-3">Senha</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control form-control mt-3" id="" placeholder="Insira a sua senha" required>
                    </div>

                    <label for="" class="col-sm-2 col-form-label col-form-label mt-3">Senha</label>
                    <div class="col-sm-10">
                        <input name="confPassword" type="password" class="form-control form-control mt-3" id="" placeholder="Confirmar senha" required>
                    </div>

                    <div class="text-right col-sm-12">
                        <input type="submit" class="btn bg-orange col-7 mt-3" value="Atualizar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection