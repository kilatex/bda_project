@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Tutor Comunitario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_tutorcom') }}" enctype="multipart/form-data" >
                    @csrf
                        <div class="row mb-3">
                            <label for="cedula" class="col-md-4 col-form-label text-md-end">{{ __('Cédula') }}</label>

                            
                            <div class="col-md-6">
                                <select class="form-select select-cedula mr-2" name="tipo_cedula"  style="width: 60px;" aria-label="Default select example">
                                    <option selected value="V">V</option>
                                    <option  value="E">E</option>
                                </select>
                                <input id="cedula" name="cedula" value= "{{old('cedula')}}" type="text" class="form-control @error('cedula') is-invalid @enderror"   autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nombres" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>

                            
                            <div class="col-md-6">
                                <input id="nombres" name="nombres" value= "{{old('nombres')}}" type="text" class="form-control @error('nombres') is-invalid @enderror"   autofocus>

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>

                            
                            <div class="col-md-6">
                                <input id="apellidos" name="apellidos" value= "{{old('apellidos')}}" type="text" class="form-control @error('apellidos') is-invalid @enderror"   autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>
                            <div class="col-md-6">
                                <input id="email" name="email" value= "{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror"   autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono" name="telefono" value= "{{old('telefono')}}" type="tel" class="form-control @error('telefono') is-invalid @enderror"   autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nombre_cargo" class="col-md-4 col-form-label text-md-end">{{ __('Cargo') }}</label>

                            
                            <div class="col-md-6">
                                <input id="nombre_cargo" name="nombre_cargo" value= "{{old('nombre_cargo')}}" type="text" class="form-control @error('nombre_cargo') is-invalid @enderror"   autofocus>

                                @error('nombre_cargo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Agregar Tutor Comunitario') }}
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