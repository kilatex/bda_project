@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Perfil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_profile') }}" enctype="multipart/form-data" >
                    @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('name') is-invalid @enderror" name="surname" value="{{ $user->surname }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Imagen de Perfil') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="img_profile" id="img_profile" >

                                @error('img_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input id="role" type="hidden" class="" name="role" value="user" >

                        <div class="row mb-3">
                            <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>

                            <div class="col-md-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>¿?</option>
                                    <option value="1">V</option>
                                    <option value="2">E</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $user->dni }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                                <label for="periodo" class="col-md-4 col-form-label text-md-end">Periodo de Ingreso</label>
                                <div class="col-md-6">

                                    <select class="form-select" aria-label="Default select example" name="periodo">
                                            <option value="" selected>Seleccione</option>

                                            @foreach($periodos as $periodo)
                                                <option value="{{$periodo->id}}">{{$periodo->name}}</option>
                                            @endforeach
                                            
                                    </select>
                                </div>    
                        
                        </div>
                        <div class="row mb-3">
                            
                                <label for="periodo" class="col-md-4 col-form-label text-md-end">Periodo de Grado</label>
                                <div class="col-md-6">

                                    <select class="form-select" aria-label="Default select example" name="periodo_grado">
                                            <option value="" selected>Seleccione</option>

                                            @foreach($periodos_grado as $periodo_grado)
                                                <option value="{{$periodo_grado->id}}">{{$periodo_grado->name}}</option>
                                            @endforeach

                                    </select>
                                </div>    
                        
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Nivel Académico</label>

                            <div class="col-md-4 d-flex">

                                <div class="radio-container">
                                    <label for="pregrado">Pregrado</label>
                                    <input type="radio" name="nivel_academico" id="pregrado">
                                </div>

                                <div class="radio-container">
                                    <label for="postgrado">Postgrado</label>
                                    <input type="radio" name="nivel_academico" id="postgrado">
                                </div>
                            </div>
                            
                        </div>
                        


                        <div class="row desact mb-3" id="pregrado_section">
                            
                            <label for="periodo" class="col-md-4 col-form-label text-md-end">Carrera de Pregrado</label>
                            <div class="col-md-6">

                                <select class="form-select" aria-label="Default select example" name="pregrado">
                                        <option value="" selected>Seleccione</option>

                                        @foreach($pregrado as $carrera)
                                            <option value="{{$carrera->id}}">{{$carrera->name}}</option>
                                        @endforeach

                                </select>
                            </div>    
                    
                        </div>

                        <div class="row desact mb-3" id="postgrado_section">
                            
                            <label for="periodo" class="col-md-4 col-form-label text-md-end">Postgrado</label>
                            <div class="col-md-6">

                                <select class="form-select" aria-label="Default select example" name="postgrado">
                                        <option value="" selected>Seleccione</option>

                                        @foreach($postgrados as $postgrado)
                                            <option value="{{$postgrado->id}}">{{$postgrado->name}}</option>
                                        @endforeach

                                </select>
                            </div>    
                    
                        </div>

                        <div class="row mb-3">
                            
                            <label for="promocion" class="col-md-4 col-form-label text-md-end">Promocion</label>
                            <div class="col-md-6">

                                <select class="form-select" aria-label="Default select example" name="promocion">
                                        <option value="" selected>Seleccione</option>

                                        @foreach($promociones as $promocion)
                                            <option value="{{$promocion->id}}">{{$promocion->name}}</option>
                                        @endforeach
                                        
                                </select>
                            </div>    
                    
                        </div>

                        <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection