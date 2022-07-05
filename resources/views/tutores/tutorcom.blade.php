@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar proyecto de pasantias') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tutorcom.store') }}" enctype="multipart/form-data" >
                    @csrf

                        <h3>Tutor Comunitario</h3>
                        <div class="row mb-3">
                            <label for="nombres" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>

                            
                            <div class="col-md-6">
                                <input id="nombres" name="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror"   autofocus>

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
                                <input id="apellidos" name="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror"   autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cedula" class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>

                            
                            <div class="col-md-6">
                                <input id="cedula" name="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror"   autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>
                            <div class="col-md-6">
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"   autofocus>

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
                            <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" name="estado" aria-label="Default select example">
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
                        </div><div class="row mb-3">
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
                        </div><div class="row mb-3">
                            <label for="nombre_cargo" class="col-md-4 col-form-label text-md-end">{{ __('Cargo') }}</label>

                            
                            <div class="col-md-6">
                                <input id="nombre_cargo" name="nombre_cargo" type="text" class="form-control @error('nombre_cargo') is-invalid @enderror"   autofocus>

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