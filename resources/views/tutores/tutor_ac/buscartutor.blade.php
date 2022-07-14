


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Verificar si hay estudiante registrados con estos campos') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('verificar_tutor') }}" enctype="multipart/form-data" >
                @csrf
                    <h5 class="text-center mb-4"> <strong>Digite la cédula del tutor a registrar para comprobar si ya está registrado</strong> </h5>
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
            
                    </div>
                </div>  

                    <div class="row mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verificar Tutor') }}
                                </button>
                            </div>
                    </div>  
            </form>
        </div>
    </div>
</div>
<style>
    .select-cedula{
        max-height: 39px; 
    }
</style>
@endsection