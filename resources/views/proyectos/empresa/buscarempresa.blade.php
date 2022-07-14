


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Verificar si hay estudiante registrados con estos campos') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('verificar_empresa') }}" enctype="multipart/form-data" >
                @csrf
                    <h5 class="text-center mb-4"> <strong>Digite el rif de la empresa a registrar para comprobar si ya está registrado</strong> </h5>
                    <div class="row mb-3">
                        <label for="rif" class="col-md-2 col-form-label text-md-end">{{ __('Rif') }}</label>
                        
                        <div class="col-md-3 ">
                            <div class="flex">

                                <select class="form-select select-cedula mr-2" disabled style="width: 60px;" aria-label="Default select example">
                                    <option selected value="J">J</option>
                                </select>
                                <div class="col-md-11">
                                    <input id="rif"  name="rif" required type="number" placeholder="123456789" class="form-control @error('rif') is-invalid @enderror"   autofocus>

                                    @error('rif')
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
                                    {{ __('Verificar Empresa') }}
                                </button>
                            </div>
                    </div>  
            </form>
            
            <div class="usuarios-encontrados mb-4 justify-content-around d-flex">

                @if($empresa)
                    <div class="empresa">
                        <div class="text-primary"> <strong>EMPRESA ENCONTRADA POR RIF</strong>   </div>
                        <div> <strong>Nombre: </strong> {{$empresa->nombre}} </div>
                        <div><strong>Rif: </strong>  {{$empresa->rif}} </div>
                        <div><strong>Email: </strong>  {{$empresa->email}} </div>
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