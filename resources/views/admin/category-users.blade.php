@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">Listar Usuarios Por Campo en Específico</h2>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Carreras
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-white">
                
                <form action=" {{ route('users_by_field') }} " method="GET">
                    <select class="form-select" aria-label="Default select example" name="field">
                        <option selected>Seleccione</option>
                        @foreach($pregrados as $carrera)

                        <option value="{{$carrera->id}}"> {{$carrera->name}}</option>

                        @endforeach
                    </select>
                    
                    <input type="hidden" name="type" value="pregrado">
                    <input type="submit" value="Listar" class="btn btn-success mt-2 ">
                </form>
          

            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Postgrados
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-white">

              <form action=" {{ route('users_by_field') }} " method="GET" enctype="multipart/form-data">
                @csrf
                  <select class="form-select" aria-label="Default select example" name="field"  >
                      <option selected>Seleccione</option>
                      @foreach($postgrados as $postgrado)

                      <option value="{{$postgrado->id}}">{{$postgrado->name}}</option>


                      @endforeach

                  </select>
                  <input type="hidden" name="type" value="postgrado">

                  <input type="submit" value="Listar" class="btn btn-success mt-2 ">
              </form>

            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Promociones
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-white">

                <form action=" {{ route('users_by_field') }} " method="GET" enctype="multipart/form-data">
                    <select class="form-select" aria-label="Default select example" name="field"  >
                        <option selected>Seleccione</option>
                        @foreach($promociones as $promocion)

                        <option value="{{$promocion->id}}">{{$promocion->name}}</option>

                        @endforeach

                    </select>
                    <input type="hidden" name="type" value="promocion">

                    <input type="submit" value="Listar" class="btn btn-success mt-2 ">
                </form>
            </div>
          </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Periodo de Ingreso
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-white">

                
                <form action=" {{ route('users_by_field') }} " method="GET" enctype="multipart/form-data">
                  @csrf
                    <select class="form-select" aria-label="Default select example" name="field"  >
                        <option selected>Seleccione</option>
                        @foreach($periodos as $periodo)

                        <option value="{{$periodo->id}}">{{$periodo->name}}</option>

                        @endforeach
                    </select>
                    <input type="hidden" name="type" value="periodo">

                    <input type="submit" value="Listar" class="btn btn-success mt-2 ">
                </form>

              </div>
            </div>
          </div>
      </div>
</div>

@endsection