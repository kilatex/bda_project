<?php 
use  App\Http\Controllers\Recopasec\EmpresaController;
?>
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Datos de la Empresa') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_empresa') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        <label for="rif" class="col-md-4 col-form-label text-md-end">{{ __('Rif') }}</label>

                        <div class="col-md-6">
                            <input id="rif" type="text" class="form-control @error('rif') is-invalid @enderror" name="rif"  required autocomplete="rif" autofocus pattern="[0-9]+">        
                            @error('rif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  required autocomplete="nombre" autofocus>        
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>

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
                                <input id="telefono" name="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"   autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="departamento" class="col-md-4 col-form-label text-md-end">{{ __('Departamento') }}</label>

                            <div class="col-md-6">
                                <input id="departamento" type="text" class="form-control @error('departamento') is-invalid @enderror" name="departamento"  required autocomplete="email">

                                @error('departamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <center><h5>Ubicación</h5></center>
                        <div class="row mb-3">
                            @livewire('select-component', ['estados' => $estados, 'municipios' => $municipios], key($estados->id, $municipios->id))
                        </div>
                        <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Agregar Empresa') }}
                                    </button>
                                </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
{{-- <div class="row mb-3">
    <label for="nombre_estado" class="col-md-4 col-form-label text-md-end">{{ __('Estados') }}</label>
    <div class="col-md-6">
        <select class="form-select" wire:model="selectedEstado" name="nombre_estado" id="estado" aria-label="Default select example">
            <option value="">Seleccione un estado</option>
            @foreach ($estados as $estado)
                <option value="{{$estado['id']}}" class="estado">{{$estado['nombre']}}</option>
            @endforeach
        </select>
    </div>
</div>
@if(!is_null($municipios))
<div class="row mb-3">
    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Municipios') }}</label>
    <div class="col-md-6">
        <select class="form-select"  wire:model="selectedMunicipio" name="municipio" id="municipio" aria-label="Default select example">
            <option value="">Seleccione un municipio</option>
            @foreach ($municipios as $municipio)
            <option value="{{$municipio['id']}}" >{{$municipio['nombre']}}</option>
        @endforeach
        </select>
    </div>
</div>
@endif
<div class="row mb-3">
    <label for="parroquia" class="col-md-4 col-form-label text-md-end">{{ __('Parroquia') }}</label>

    
    <div class="col-md-6">
        <input id="parroquia" name="parroquia" type="text" class="form-control @error('parroquia') is-invalid @enderror"   autofocus>

        @error('parroquia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror 
    </div>
</div> --}}
<script>

/*             const select  = document.getElementById("estado");
            select
            const csrf = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log(csrf)
            select.addEventListener('change', (e)=>{
            fetch('municipios',{
            method: 'POST',
            body: JSON.stringify({direccion : e.target.value}),
            headers:{
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }

            }).then(response => {
            console.log(response.data);

            return response.json()
            }).then(data =>{
            console.log('data');


            }).catch(error =>console.error(error));
}) */

</script>
@endsection
