
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Empresa') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('store_empresa') }}" enctype="multipart/form-data" >
                        @csrf
                            <div class="row mb-3">
                                <label for="rif" class="col-md-4 col-form-label text-md-end">{{ __('Rif') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="rif" name="rif"  value="{{$rif}}" readonly type="text" class="form-control @error('rif') is-invalid @enderror"   autofocus>

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
                                <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono"  required autocomplete="telefono" autofocus>

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" value="{{$email}}" aria-readonly="true" readonly class="form-control @error('email') is-invalid @enderror" name="email"   autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="departamento" class="col-md-4 col-form-label text-md-end">{{ __('Departamento') }}</label>

                                <div class="col-md-6">
                                    <input id="departamento" type="text" class="form-control @error('departamento') is-invalid @enderror" name="departamento"  autocomplete="departamento">

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
                            <center><h5>Tutor Institucional</h5></center>

                            <div class="row mb-3">
                                <label for="cedula" class="col-md-4 col-form-label text-md-end">{{ __('Cédula') }}</label>
                                <select class="form-select select-cedula mr-2" name="tipo_cedula"  style="width: 60px;" aria-label="Default select example">
                                    <option selected value="V">V</option>
                                    <option  value="E">E</option>
                                </select>
                                <div class="col-md-6">
                                    
                                    <input id="cedula" name="cedula" value= "{{old('cedula')}}" type="text" class="form-control @error('cedula') is-invalid @enderror"   autofocus>
                                    @error('cedula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nombres" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>
    
                                
                                <div class="col-md-6">
                                    <input id="nombres" name="nombres" value= "{{old('nombres')}}" type="text" class="form-control @error('nombres') is-invalid @enderror"   autofocus>
    
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
                                    <input id="apellidos" name="apellidos" value= "{{old('apellidos')}}" type="text" class="form-control @error('apellidos') is-invalid @enderror"   autofocus>
    
                                    @error('apellidos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email_tu" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>
                                <div class="col-md-6">
                                    <input id="email_tu" name="email_tu" value= "{{old('email_tu')}}" type="email" class="form-control @error('email_tu') is-invalid @enderror"   autofocus>
    
                                    @error('email_tu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telefono_tu" class="col-md-4 col-form-label text-md-end">{{ __('telefono_tu') }}</label>
                                <div class="col-md-6">
                                    <input id="telefono_tu" name="telefono_tu" value= "{{old('telefono')}}" type="tel" class="form-control @error('telefono_tu') is-invalid @enderror"   autofocus>
    
                                    @error('telefono_tu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="especialidad" class="col-md-4 col-form-label text-md-end">{{ __('Especialidad') }}</label>
    
                                
                                <div class="col-md-6">
                                    <input id="especialidad" name="especialidad" value= "{{old('especialidad')}}" type="text" class="form-control @error('especialidad') is-invalid @enderror"   autofocus>
    
                                    @error('especialidad')
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
