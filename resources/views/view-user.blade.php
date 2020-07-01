@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
<style>
    body {
        background-color: #e2e2e2;
    }
</style>
    
    <div class="container">
        <div class="col-md-5 bg-white rounded mx-auto mt-5 p-3">
            @include('flash::message')
            
                <h2 class="text-center mb-3">Perfil</h2>
                <div class="form-group row">
                    
                    
                    <label for="" class="col-sm-2 col-form-label col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input name="name" type="text" class="input-t" id="" value="{{ Auth::user()->name }}" required>
                    </div>

                    <label for="" class="col-sm-2 col-form-label col-form-label mt-3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="input-t mt-3" id="" placeholder="" value="{{ Auth::user()->email }}" required>
                    </div>


                    <div class="text-right col-sm-12">
                        <a class="btn bg-orange col-7 mt-3" href="{{ route('profiles.user.edit', ['user' => Auth::user()->id ]) }}"> Editar <i class="fa fa-paper-plane"></i></a>
                    </div>
                </div>

        </div>
    </div>
@endsection