@extends('layouts.app')

@section('content')

    <div class="container">
        
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Modificar Archivo') }}</div>

                        <div class="card-body">

                            <form action=" {{route('update_docs')}} " method="post" enctype="multipart/form-data">

                            @csrf
                            
                            <h5>Seleccione el Archivo a Modificar</h5>
                            <select class="form-select" name="select_document" aria-label="Default select example">

                                <option selected>Seleccione</option>
                                <option value="record_academico" >Record Académico</option>
                                <option value="inscripcion_militar">Inscripcion militar, baja militar o carnet profesional activo o en reserva activa (Si es mayor de edad)</option>
                                <option value="registro_ingreo_educacion_universitaria">Registro de sistema nacional de ingreso a la educación univeristaria (OPSU)</option>
                                <option value="copia_titulo_educacion_media">Fotocopia simple del título de educación media</option>
                                <option value="fondo_negro_titulo_educacion_media">Fondo negro del titulo de educacion media certificado por la instituciond e procedencia</option>
                                <option value="copia_notas">Fotocopia simple de notas certificadas (educación media) certificadas por la institución de procedencia</option>
                                <option value="copia_cedula">Fotocopia de cedula de Identidad (Pasaporte en caso de ser extranjero)</option>
                                <option value="copia_partida_nacimiento">Fotocopia de la partida de nacimiento</option>



                            </select>
                            <input type="hidden" name="estudiante_id" value="{{$estudiante->id}}">
                            <div class="input-group mb-3 mt-4">
                                <label class="input-group-text" for="inputGroupFile01">Subir</label>
                                <input type="file" class="form-control" name="file_modify">
                            </div>

                            <input type="submit" value="Modificar" class="btn btn-success" >

                            </form>
                         

                        </div>
                    </div>
                    
                </div>
        </div>
    </div>

@endsection