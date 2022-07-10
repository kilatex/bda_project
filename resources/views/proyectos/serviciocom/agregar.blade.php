@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Estudiantes por cédula o por nombre') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_comunitario') }}" enctype="multipart/form-data" >
                    @csrf

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Cédula del estudiante') }}</label>

                            <div class="col-md-6">
                                <section>
                                    <option value="V">V</option>
                                    <option value="E">E</option>
                                </section>
                                <input id="cedula" type="text" value= "{{old('cedula')}}" class="form-control @error('cedula') is-invalid @enderror" name="cedula"  required autocomplete="cedula" autofocus>
        
                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="nombres" type="text" value= "{{old('nombers')}}" class="form-control @error('nombres') is-invalid @enderror" name="nombres"  required autocomplete="nombres" autofocus>
        
                                    @error('nombres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Buscar') }}
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