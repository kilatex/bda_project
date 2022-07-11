


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Verificar si hay estudiante registrados con estos campos') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('verificar_usuario') }}" enctype="multipart/form-data" >
                @csrf
                    <h5 class="text-center mb-4"> <strong>Digite la cédula y el correo electrónico del estudiante a registrar para comprobar si ya está registrado</strong> </h5>
                    <div class="row mb-3">
                        <label for="dni" class="col-md-2 col-form-label text-md-end">{{ __('Cédula') }}</label>
                        
                        <div class="col-md-3 ">
                            <div class="flex">

                                <select class="form-select select-cedula mr-2" name="tipo_cedula" required style="width: 60px;" name="tipo_cedula" aria-label="Default select example">
                                    <option selected value="V">V</option>
                                    <option value="E">E</option>
                                </select>
                                <div class="col-md-11">
                                    <input id="cedula"  name="cedula" required type="text" placeholder="29699795" class="form-control @error('cedula') is-invalid @enderror"   autofocus>

                                    @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                        
                        </div>
            

                
                        <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Email') }}</label>
                        <div class="col-md-3">
                            <input id="email" required type="email" class="form-control @error('email') is-invalid @enderror" name="email"   autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                    </div>
                </div>   
                    <input type="hidden" name="rol" value="STUDENT">
                    



                    <div class="row mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verificar Estudiante') }}
                                </button>
                            </div>
                    </div>  
            </form>
            
            <div class="usuarios-encontrados mb-4 justify-content-around d-flex">

                @if($userByCedula)
                    <div class="userByCedula">
                        <div class="text-primary"> <strong>USUARIO ENCONTRADO POR CEDULA</strong>   </div>
                        <div> <strong>Nombres y Apellidos: </strong> {{$userByCedula->nombres}}  {{$userByCedula->apellidos}} </div>
                        <div><strong>Cédula: </strong>  {{$userByCedula->cedula}} </div>
                        <div><strong>Email: </strong>  {{$userByCedula->email}} </div>
                        <div><strong>Rol en el Sistema: </strong>
                            @if($userByCedula->rol == "STUDENT")
                                Estudiante
                            @endif    
                            @if($userByCedula->rol == "USER")
                                Empleado
                            @endif    
                        
                        </div>
                    </div>
                @endif

                @if($userByEmail)
                <div class="userByEmail">                   
                    <div class="text-primary"> <strong>USUARIO ENCONTRADO POR EMAIL</strong> </div>
                    <div> <strong>Nombres y Apellidos: </strong> {{$userByEmail->nombres}}  {{$userByEmail->apellidos}} </div>
                    <div><strong>Cédula: </strong>  {{$userByEmail->cedula}} </div>
                    <div><strong>Email: </strong>  {{$userByEmail->email}} </div>
                    <div><strong>Rol en el Sistema: </strong>
                        @if($userByEmail->rol == "STUDENT")
                            Estudiante
                        @endif    
                        @if($userByEmail->rol == "USER")
                            Empleado
                        @endif    
                    
                    </div>
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