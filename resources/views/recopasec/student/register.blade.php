@extends('layouts.app')

@section('content')
<div class="container">
        @if ($message)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger" role="alert">
                    Registro Incorrecto, vuelve a intentarlo
                    <strong> {{$message}}</strong>
                </div>
                
            </div>
        </div>
        @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Nuevo Estudiante') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register_student') }}" enctype="multipart/form-data" >
                    @csrf
                        <div class="row mb-3">
                            <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('Cédula') }}</label>
                            
                            <div class="col-md-6">
                                <input id="cedula" name="cedula"  readonly value="{{$cedula}}"  type="text" class="form-control @error('cedula') is-invalid @enderror"   autofocus>
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
                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres"  required autocomplete="nombres" autofocus>
        
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
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos"  required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{$email}}"  aria-readonly="true" readonly class="form-control @error('email') is-invalid @enderror" name="email"   autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>
                        <input type="hidden" name="rol" value="STUDENT">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Carrera</label>
                            <div class="col-md-6">
                                <select class="form-select" required name="carrera" aria-label="Default select example">
                                    <option selected value="null">Carrera</option>
                                    <option value="1">Ingeniería de Sistemas</option>
                                    <option value="2">Ingeniería Eléctrica</option>
                                    <option value="3">Ingeniería Civil</option>
                                    <option value="4">Lic. Economía</option>
                                    <option value="5">Lic. Turismo</option>
                                    <option value="6">Lic. Administración</option>

                                </select>   
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Periodo De Ingreso</label>
                            <div class="col-md-6">
                                <select class="form-select" required name="periodo_ingreso" aria-label="Default select example">
                                    <option selected value="null">Seleccione</option>
                                    <option value="1-2014">1-2014</option>
                                    <option value="2-2014">2-2014</option>
                                    <option value="1-2015">1-2015</option>
                                    <option value="2-2015">2-2015</option>
                                    <option value="1-2016">1-2016</option>
                                    <option value="2-2016">2-2016</option>
                                    <option value="1-2017">1-2017</option>
                                    <option value="2-2017">2-2017</option>
                                    <option value="1-2018">1-2018</option>
                                    <option value="2-2018">2-2018</option>
                                    <option value="1-2019">1-2019</option>
                                    <option value="2-2019">2-2019</option>
                                    <option value="1-2020">1-2020</option>
                                    <option value="2-2020">2-2020</option>
                                    <option value="1-2021">1-2021</option>
                                    <option value="2-2021">2-2021</option>
                                    <option value="1-2022">1-2022</option>

                                </select>   
                            </div>
                        </div>
                       <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrarse') }}
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