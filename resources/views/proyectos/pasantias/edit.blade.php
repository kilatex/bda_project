@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Notificación') }}</div>
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            Registro Incorrecto, vuelve a intentarlo
                        </div>
                    </div>
            </div>    
        </div>
    </div>
    @endif
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Proyecto
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('pasantias.update') }}" enctype="multipart/form-data" >
                    @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Codigo del proyecto') }}</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{old('codigo', $pasantia->codigo)}}" autofocus>
        
                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{old('titulo', $pasantia->titulo)}}" autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="fecha_inicio" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de inicio') }}</label>

                            
                            <div class="col-md-6">
                                <input id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio', $pasantia->fecha_inicio)}}" type="text" class="form-control @error('fecha_inicio') is-invalid @enderror"   autofocus>

                                @error('fecha_inicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha_final" class="col-md-4 col-form-label text-md-end">{{ __('Fecha Final') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_final" type="text" class="form-control @error('fecha_final') is-invalid @enderror" name="fecha_final" value="{{old('fecha_final', $pasantia->fecha_final)}}">

                                @error('fecha_final')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Agregar proyecto') }}
                                </button>
                            </div>
                        </div>  
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Empresa
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Datos de la Empresa') }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('empresas.update') }}" enctype="multipart/form-data" >
                                @csrf
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  value="{{old('nombre', $empresa->nombre)}}" autofocus>
                    
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
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{old('email', $empresa->email)}}" autofocus>
            
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
                                            <input id="telefono" name="telefono" value="{{old('telefono', $empresa->telefono)}}" type="text" class="form-control @error('telefono') is-invalid @enderror"   autofocus>
            
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
                                            <input id="departamento" type="text" class="form-control @error('departamento') is-invalid @enderror" name="departamento" value="{{old('departamento', $empresa->departamento)}}">
            
                                            @error('departamento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <h3>Ubicación</h3>
                                    <div class="row mb-3">
                                        <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estados') }}</label>
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
                                    <div class="row mb-3">
                                        <label for="municipio" class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>
            
                                        
                                        <div class="col-md-6">
                                            <input id="municipio" name="municipio" value="{{old('municipio', $direccion->municipio)}}" type="text" class="form-control @error('municipio') is-invalid @enderror"   autofocus>
            
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
                                            <input id="parroquia" name="parroquia" value="{{old('parroquia', $direccion->parroquia)}}" type="text" class="form-control @error('parroquia') is-invalid @enderror"   autofocus>
            
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
                                                    {{ __('Actualizar Empresa') }}
                                                </button>
                                            </div>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Tutor Academico
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Tutor Institucional
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
      </div>

@endsection