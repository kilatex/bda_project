@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ubicación de la Comunidad') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store_direccion') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        @livewire('select-component', ['estados' => $estados, 'municipios' => $municipios], key($estados->id, $municipios->id))
                    </div>
                        <div class="row mb-3">
                            <label for="comunidad" class="col-md-4 col-form-label text-md-end">{{ __('Comunidad') }}</label>

                            
                            <div class="col-md-6">
                                <input id="comunidad" name="comunidad" type="text" class="form-control @error('comunidad') is-invalid @enderror"   autofocus>

                                @error('comunidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="consejo_comunal" class="col-md-4 col-form-label text-md-end">{{ __('Consejo Comunal') }}</label>

                            
                            <div class="col-md-6">
                                <input id="consejo_comunal" name="consejo_comunal" type="text" class="form-control @error('consejo_comunal') is-invalid @enderror"   autofocus>

                                @error('consejo_comunal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Agregar Ubicación') }}
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