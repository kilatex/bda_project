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
                    @if($comunitario) 
                    <li> <strong> Expediente: </strong> <strong> <a href="{{route('show_expediente', ['comunitario_id'=> $comunitario->id])}}">haz click aquí para observarlo</a></strong>  </li>
                    @else
                        <li> Este estudiante no posee proyecto, debe crear un proyecto nuevo o añadirlo a uni existente</li>
                    @endif
                </ul>
            @else
                <h2>El estudiante no esta en el sistema</h2>
            @endif
        </div>
    </div>
</div>

@endsection