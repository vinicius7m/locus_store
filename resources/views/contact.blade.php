@extends('layouts.app')

@section('title', 'Contato')

@section('content')
    <style>
        body{
            background-color: #e2e2e2;
        }
    </style>
    <div class="mt-5 text-center">
        <div class="container">    
            <form class="col-md-5 bg-white mx-auto rounded p-3" action="{{ url('contact/comment') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h2>Contato</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="inputBox">
                            <div class="inputText"></div>
                            <input type="text" name="name" class="input" placeholder="Nome" require>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="inputBox">
                            <div class="inputText"></div>
                            <input type="email" name="email" class="input" placeholder="E-mail">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="inputBox">
                            <div class="inputText"></div>
                            <textarea name="message" class="input" placeholder="Mensagem"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <button type="submit" class="btn bg-orange btn-block btn-lg"> Enviar <i class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
                @include('flash::message')
            </form>
        </div>    
    </div>

@endsection