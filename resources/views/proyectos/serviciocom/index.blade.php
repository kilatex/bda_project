@extends('layouts.app')

@section('content')
    <center>
        <div>
            <h1>Bienvenido a RECOPASEC</h1>
            <h3>Servicio Comunitario</h3>
        </div>
    </center>
    <div class="max-w-6xl mx-auto    sm:px-6 lg:px-8">
        <div class="menu-unefa flex">
            <div class="item-menu flex mt-3 ">
                <div class="img-item">
                <img src="{{ asset('images/home/biblioteca.png') }}" alt="">
                </div>
                <div class="title">
                <h4>Estudiantes</h4>
                <a class="btn btn-primary" href="{{route('students_list')}}" role="button">Ver</a>
                </div>
            </div>
            <div class="item-menu flex mt-3 ">
                <div class="img-item">
                <img src="{{ asset('images/home/archivo.png') }}" alt="">
                </div>
                <div class="title">
                <h4>Carreras</h4>
                <a class="btn btn-primary" href="{{route('category_users')}}" role="button">Ver</a>
                </div>
            </div>
        </div>
    </div>
@endsection