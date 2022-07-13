@extends('layouts.app')

@section('content')
@if($message)
<div class="row justify-content-center">
    <div class="col-md-8">
        @if($danger) <div class="alert alert-danger" role="alert">  @endif
            <strong> {{$message}}</strong>
        </div>
        
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Perfil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_profile') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" readonly type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ $user->nombres }}" required autocomplete="nombres" autofocus>

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="surname"  readonly type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $user->apellidos }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="dni"  class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>

 
                            
                            <div class="col-md-6">
                                <input id="dni"  readonly type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $user->cedula }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" readonly type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                 

                        <div class="row mb-3">
                            <label for="dni"  class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                               
                                
                                <div class="col-md-1">
                                <select class="form-select" name="codigo" style="width: 90px" aria-label="Default select example">
                                    <option value="0424">0424</option>
                                    <option value="0414">0414</option>
                                    <option value="0412">0412</option>
                                    <option value="0416">0416</option>
                                    <option value="0426">0426</option>
                                </select>
                                </div>
                              
                                <div class="col-md-5">
                                    <input id="telefono"  minlength="7" maxlength="7"   type="text" class="form-control @error('dni') is-invalid @enderror" name="telefono" value="{{ $user->telefono }}" required autocomplete="dni" autofocus>
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="#" class="text-warning change_password" data-toggle="modal" data-target="#exampleModal">
                                            <strong>
                                                Cambiar Contraseña
                                            </strong>
                                        </a>
                                    </div>

                                </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar Perfil') }}
                                </button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('change_password') }}" enctype="multipart/form-data" >
                @csrf

                <div class="row mb-3">
                    <label for="old_password" class="col-md-5 col-form-label text-md-end">{{ __('Contraseña Actual') }}</label>

                    <div class="col-md-6">
                        <input id="old_password" placeholder="Digite su contraseña actual"  type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="email">

                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="new_password" class="col-md-5 col-form-label text-md-end">{{ __('Contraseña Nueva') }}</label>

                    <div class="col-md-6">
                        <input id="new_password" placeholder="Digite su contraseña nueva"  type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required  >

                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_confirm" class="col-md-5 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                    <div class="col-md-6">
                        <input id="password_confirm" placeholder="Confirmar contraseña"  type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" required autocomplete="email">

                        @error('password_confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn  btn-primary">
                        {{ __('Cambiar Contraseña') }}
                    </button>
                </div>

            </form>
        </div>
        <div class="modal-footer">
  
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<style>
    a.change_password{
        transition: all 300ms;
    }
    .change_password:hover{
        color: blue !important;
    }
</style>
@endsection