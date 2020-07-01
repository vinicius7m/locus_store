@extends('layouts.appAdmin')

@section('content')

<section class="banner">
    <a href="{{url('/products')}}">
        <img src="{{ asset('img/adm_banner.png') }}" alt="" class="img-fluid w-100" style="height: 550px;">
    </a>
</section>

@endsection