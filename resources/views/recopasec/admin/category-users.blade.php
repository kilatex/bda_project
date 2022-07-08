@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">Listar Usuarios Por Carrera</h2>
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
                        <option value="{{$carrera->id}}"> {{$carrera->nombre}}</option>
                        @endforeach
                    </select>
                    
                    <input type="hidden" name="type" value="carrera">
                    <input type="submit" value="Listar Estudiantes" class="btn btn-success mt-2 ">
                </form>
          

            </div>
          </div>
        </div>
    
    </div>
</div>

@endsection