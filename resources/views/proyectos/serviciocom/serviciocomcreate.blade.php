@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar proyecto de servicio comunitario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_comunitario') }}" enctype="multipart/form-data" >
                    @csrf

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código del proyecto') }}</label>
                            <select class="form-select mr-2" name="n-codigo" style="width: 100px;" aria-label="Default select example">
                                <option value="">Indique el código de la carrera</option>
                                <option value="ISS">ISS</option>
                                <option value="ICV">ICV</option>
                                <option value="IEL">IEL</option>
                                <option value="LITUR">LITUR</option>
                                <option value="LAGM">LAGM</option>
                                <option value="LES">LES</option>
                                <option value="MDC">MDC</option>
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
                        <br>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Titulo') }}</label>

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
                            <label for="periodo" class="col-md-4 col-form-label text-md-end">{{ __('Periodo Acádemico') }}</label>
                            <div class="col-md-6">
                                <select class="form-select select-cedula mr-2" name="n-periodo" style="width: 60px;" aria-label="Default select example">
                                    <option value="">Indique la seccion del periodo</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                <input id="periodo" name="periodo" value= "{{old('periodo')}}" type="text" class="form-control @error('periodo') is-invalid @enderror" required autocomplete="periodo" autofocus>
                                @error('periodo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="periodo" class="col-md-4 col-form-label text-md-end">{{ __('Calificación del proyecto') }}</label>
                            <div class="col-md-6">
                                <select class="form-select select-cedula mr-2" name="calificacion" style="width: 60px;" aria-label="Default select example">
                                    <option value="">Indique la calificación del estudiante</option>
                                    <option value="aprob">Aprobado</option>
                                    <option value="repro">Reprobado</option>
                                </select>
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