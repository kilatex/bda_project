


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Verificar si hay estudiante registrados con estos campos') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('verificar_estudiante') }}" enctype="multipart/form-data" >
                @csrf
                    <h5 class="text-center mb-4"> <strong>Digite la cédula del estudiante a registrar para comprobar si ya reaalizo las pasantias</strong> </h5>
                    <div class="row mb-3">
                        <label for="rif" class="col-md-2 col-form-label text-md-end">{{ __('Cédula') }}</label>
                        
                        <div class="col-md-3 ">
                            <div class="flex">

                                <select class="form-select select-cedula mr-2" name="tipo_cedula" style="width: 60px;" aria-label="Default select example">
                                    <option  value="V">V</option>
                                    <option  value="E">E</option>
                                </select>
                                <div class="col-md-11">
                                    <input id="cedula"  name="cedula" required type="number" placeholder="123456789" class="form-control @error('cedula') is-invalid @enderror"   autofocus>

                                    @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>

            
                    </div>
                </div>   
                    <div class="row mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verificar Empresa') }}
                                </button>
                            </div>
                    </div>  
            </form>
            
            <div class="usuarios-encontrados mb-4 justify-content-around d-flex">

                @if($calificacion)
                    <div class="calificacion">
                        <div class="text-primary"> <strong>Datos del Estudiante</strong>   </div>
                        <div> <strong>Nombres y Apellidos: </strong> {{$calificacion->estudiante->user->nombres}}  {{$calificacion->estudiante->user->apellidos}}</div>
                        <div><strong>Cédula: </strong>  {{$calificacion->estudiante->user->cedula}} </div>
                        <div><strong>Email: </strong>  {{$calificacion->estudiante->user->email}} </div>
                        <div><strong>Carrera: </strong>  {{$calificacion->estudiante->carrera->nombre}} </div>
                        <div><strong>Proyecto: </strong>  {{$calificacion->proyecto_pasantias->titulo}} </div>
                        <div><strong>Tutor Institucional: </strong>  {{$calificacion->proyecto_pasantias->tutor_institucional->nombres}} {{$calificacion->proyecto_pasantias->tutor_institucional->apellidos}}</div>
                        <div><strong>Tutor Académico: </strong>  {{$calificacion->proyecto_pasantias->tutor_academico->nombres}} {{$calificacion->proyecto_pasantias->tutor_academico->apellidos}}</div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
<style>
    .select-cedula{
        max-height: 39px; 
    }
</style>
@endsection