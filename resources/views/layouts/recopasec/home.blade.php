@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto    sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8 title-web">
        Recopasec 
        <img src="{{ asset('images/unefa-logo.png') }}" alt="" srcset="">
    </div>

    <div class="menu-unefa flex">
        <div class="item-menu flex mt-3 ">
            <div class="img-item">
            <img src="{{ asset('images/home/archivo.png') }}" alt="">
            </div>
            <div class="title">
            <h4>Pasantías</h4>
            </div>
        </div>
        <div class="item-menu flex mt-3 ">
            <div class="img-item">
            <img src="{{ asset('images/home/biblioteca.png') }}" alt="">
            </div>
            <div class="title">
            <h4>Servicio Comunitario</h4>
            </div>
        </div>
    </div>



</div>
@endsection
