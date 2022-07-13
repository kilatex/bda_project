@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar proyecto de pasantias') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_pasantias') }}" enctype="multipart/form-data" >
                    @csrf

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Codigo del proyecto') }}</label>
                            <select class="form-select select-cedula mr-2" disabled style="width: 60px;" aria-label="Default select example">
                                <option selected value="P">P</option>
                            </select>
                            <div class="col-md-6">
                                <input id="codigo" type="text" value= "{{old('codigo')}}" class="form-control @error('codigo') is-invalid @enderror" name="codigo"  required autocomplete="nombres" autofocus>
        
                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Título del proyecto') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" value= "{{old('titulo')}}" class="form-control @error('titulo') is-invalid @enderror" name="titulo"  required autocomplete="titulo" autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="periodo" class="col-md-4 col-form-label text-md-end">{{ __('Periodo') }}</label>
                            <select class="form-select select-cedula mr-2" name="n-periodo" style="width: 60px;" aria-label="Default select example">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            
                            <div class="col-md-6">
                                <input id="periodo" type="number" min="2007" max="2022" placeholder="2007" style="width: 100px;" value= "{{old('periodo')}}" class="form-control @error('periodo') is-invalid @enderror" name="periodo"  required autocomplete="periodo">

                                @error('periodo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="calificacion_tutorac" class="col-md-4 col-form-label text-md-end">{{ __('Calificación del Tutor Académico') }}</label>
                            
                            <div class="col-md-6">
                                <input id="calificacion_tutorac" type="number" min="01" max="20" style="width: 70px;" value= "{{old('calificacion_tutorac')}}" class="form-control @error('calificacion_tutorac') is-invalid @enderror" name="calificacion_tutorac"  required autocomplete="calificacion_tutorac">

                                @error('calificacion_tutorac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><div class="row mb-3">
                            <label for="calificacion_tutorin" class="col-md-4 col-form-label text-md-end">{{ __('Calificación del Tutor institucional') }}</label>
                            
                            <div class="col-md-6">
                                <input id="calificacion_tutorin" type="number" min="01" max="20" style="width: 70px;" value= "{{old('calificacion_tutorin')}}" class="form-control @error('calificacion_tutorin') is-invalid @enderror" name="calificacion_tutorin"  required autocomplete="calificacion_tutorin">

                                @error('calificacion_tutorin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><div class="row mb-3">
                            <label for="calificacion_docentevalu" class="col-md-4 col-form-label text-md-end">{{ __('Calificación del Docente Evaluador') }}</label>
                            
                            <div class="col-md-6">
                                <input id="calificacion_docentevalu" type="number" min="01" max="20" style="width: 70px;" value= "{{old('calificacion_docentevalu')}}" class="form-control @error('calificacion_docentevalu') is-invalid @enderror" name="calificacion_docentevalu"  required autocomplete="calificacion_docentevalu">

                                @error('calificacion_docentevalu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Agregar proyecto') }}
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