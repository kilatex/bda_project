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
                            <label for="periodo" class="col-md-4 col-form-label text-md-end">{{ __('periodo') }}</label>

                            <div class="col-md-6">
                                <input id="periodo" type="text" value= "{{old('periodo')}}" class="form-control @error('periodo') is-invalid @enderror" name="periodo"  required autocomplete="periodo">

                                @error('periodo')
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