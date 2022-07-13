@extends('layouts.app')


@section('content')

<div class="container">


    <h2 class="text-center">Expediente</h2>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Añadir Documento al Expediente
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-white">
                <div>
                    <h5> <strong>Información del Estudiante</strong></h5> 
                    <h6>{{$estudiante->user->nombres}} {{$estudiante->user->apellidos}} </h6>
                    <h6>Cédula: {{$estudiante->user->cedula}} </h6>
                    <h6>Carrera: {{$estudiante->carrera->nombre}} </h6>
                    <h6> {{$estudiante->nombre}}   </h6>

                    @if($message)      
                     <h6 class="text-danger"><strong>{{$message}} </strong> </h6>
                    @endif


                   
                </div>
                <form method="POST" action=" {{ route('subir') }} " enctype="multipart/form-data" >
                    @csrf
                    <div class="d-flex">
                        <div class="select-unefa">
                            <select id="docs" class="form-select " onchange="select()" aria-label="Default select example" name="field">
                                <option value="null"  selected>Seleccione</option>
                                <option value="record_academico" >Record Académico</option>
                                <option value="inscripcion_militar">Inscripcion militar, baja militar o carnet profesional activo o en reserva activa (Si es mayor de edad)</option>
                                <option value="registro_ingreo_educacion_universitaria">Registro de sistema nacional de ingreso a la educación univeristaria (OPSU)</option>
                                <option value="copia_titulo_educacion_media">Fotocopia simple del título de educación media</option>
                                <option value="fondo_negro_titulo_educacion_media">Fondo negro del titulo de educacion media certificado por la instituciond e procedencia</option>
                                <option value="copia_notas">Fotocopia simple de notas certificadas (educación media) certificadas por la institución de procedencia</option>
                                <option value="copia_cedula">Fotocopia de cedula de Identidad (Pasaporte en caso de ser extranjero)</option>
                                <option value="copia_partida_nacimiento">Fotocopia de la partida de nacimiento</option>
                            </select>  
                        </div>
                        <input type="hidden" name="estudiante_id" value="{{$estudiante_id}}">

                        <div class="file-box">
                            <input type="file" class="btn btn-primary hidden mt-2" name="file" required="required" id="file">
                        </div>

                    </div>
                    
                    <div class="d-flex">
                        
                        <input type="submit" class="btn btn-success mt-3" value="Subir Documento">
                    </div>

               </form>
               @if($expediente) 
                <h4 class="mt-3 text-center">Documentos del Expediente</h4>
                <div class="table-expediente">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha de Subida</th>
                                <th scope="col">Ultima Modificación</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($documentos as $documento)

                                <tr>
                                    <th scope="row">{{$documento->orden}}</th>
                                    <td>{{$documento->nombre}}</td>
                                    <td>{{$documento->estado}}</td>
                                    <td>{{date_format($documento->created_at,'d/m/Y')}}</td>
                                    <td>{{date_format($documento->updated_at,'d/m/Y')}}</td>
                                </tr>
                            @endforeach
                    

                            </tbody>
                        </table>
                </div>
               @endif 

            </div>
          </div>
        </div>
    
    </div>
</div>
<script>
    const selection = document.getElementById("docs");
    const file = document.getElementById("file");
    function select() {
    if(selection.options[selection.selectedIndex].value != "null"){
        file.classList.remove('hidden');
    }else{
        file.classList.add('hidden');
    }
     }
   
</script>

<style>
    .hidden{
        display:none;
    }
    .select-unefa{
        width: 50%;
        margin-right: 20px;
    }
    .file-box{
        position:relative;
        top: -10px;
    }
</style>
@endsection