@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($user)
                <h2>Información de Estudiante</h2>

                <ul>
                    <li> <strong> Nombres y Apellidos: </strong> {{$user->user->nombres}}  {{$user->user->apellidos}} </li>
                    <li> <strong> Cédula De Identidad o Pasaporte: </strong> {{$user->user->cedula}}  </li>
                    <li> <strong> Correo Electrónico: </strong> {{$user->user->email}}  </li>
                    <li> <strong> Teléfono: </strong> {{$user->user->telefono}}</li>
                    <li> <strong> Carrera: </strong> {{$user->carrera->nombre}}</li>
                    @if($expediente) 
                    <li> <strong> Expediente: </strong> <strong> <a href="{{route('show_expediente', ['expediente_id'=> $expediente->id])}}">haz click aquí para observarlo</a></strong>  </li>
                    @else
                        <li> Este estudiante no posee expediente, <strong> <a href="{{route('upload', ['user'=> $user->id])}}">haz click aquí para crearlo</a></strong> </li>
                    @endif
                </ul>
            @else
                <h2>ESTUDIANTE NO ESSSSISTE</h2>
            @endif
        </div>
    </div>
</div>

@endsection