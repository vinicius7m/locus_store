@extends('layouts.app')

@section('title', 'Quem somos')

@section('content')

    <div class="container">
        <div class="col-sm-6 float-left">
            <img src="{{ asset('img/quem-somos.png') }}" style="width: 500px; height: 580px;">
        </div>

        <section class="qsomos col-sm-5 pt-5 float-right">
            
            <h3>Quem somos?</h3>

            <h5 class="lead text-justify">
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. In distinctio laudantium eaque. Adipisci fugi
                    at maxime possimus nesciunt quis sed velit impedit id. Expedita provident culpa rerum iure explicabo laborum
                    praesentium!
                </p>
            </h5>
            

            <div class="text-right">
                <a style="color: #ffffff;" class="btn bg-orange btn-lg" href="/products">Conheça nossos produtos →</a>

            </div>
        </section>
    </div>


    
    
    

@endsection