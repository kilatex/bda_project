@extends('layouts.app')

@section('content')
<div class="container">
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ubicación de la Comunidad') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('empresas.create') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estados') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccione un estado</option>
                                <option value="amazonas">Amazonas</option>
                                <option value="anzoategui">Anzoátegui</option>
                                <option value="apure">Apure</option>
                                <option value="aragua">Aragua</option>
                                <option value="barinas">Barinas</option>
                                <option value="bolivar">Bolivar</option>
                                <option value="carabobo">Carabobo</option>
                                <option value="cojedes">Cojedes</option>
                                <option value="delta_amacuro">Delta Amacuro</option>
                                <option value="distrito_capital">Distrito Capital</option>
                                <option value="falcon">Falcón</option>
                                <option value="guarico">Guárico</option>
                                <option value="lara">Lara</option>
                                <option value="merida">Mérida</option>
                                <option value="miranda">Miranda</option>
                                <option value="monagas">Monagas</option>
                                <option value="nueva_esparta">Nueva Esparta</option>
                                <option value="portuguesa">Portuguesa</option>
                                <option value="sucre">Sucre</option>
                                <option value="tachira">Táchira</option>
                                <option value="trujillo">Trujillo</option>
                                <option value="vargas">Vargas</option>
                                <option value="yaracuy">Yaracuy</option>
                                <option value="zulia">Zulia</option>
                            </select>
                        </div>
                    </div>
                        <div class="row mb-3">
                            <label for="municipio" class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>

                            
                            <div class="col-md-6">
                                <input id="municipio" name="municipio" type="text" class="form-control @error('municipio') is-invalid @enderror"   autofocus>

                                @error('municipio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
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

@endsection