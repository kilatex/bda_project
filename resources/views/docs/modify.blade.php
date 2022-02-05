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
                                <option value="planilla_datos_personales">Planilla de Datos Personales</option>
                                <option value="copia_cedula">Copia de Cédula</option>
                                <option value="record_academico">Record Académico</option>
                                <option value="constancia_culminacion_servicio_comunitario">Constancia de Culmincación de Servicio Comunitario</option>
                                <option value="acta_evaluacion_pasantias">Acta de Evaluación de Pasantias</option>
                                <option value="certificado_pasantias">Certificado Pasantías</option>
                                <option value="acta_defensa_trabajo_especial_grado">Acta de Defensa de Trabajo Especial de Grado</option>
                                <option value="constancia_practicas_educativas">Constacia de Practicas Educativas</option>
                                <option value="acta_pasantia_hospitalaria_comunitaria">Acta de Pasantía Hospitalaria Comunitaria</option>
                                <option value="certificado_pastantia_hospitalaria_comunitaria">Certificado de Pasantía Hospitalaría Comunitaria</option>
                                <option value="comunicacion_adicional_casos_concretos">Comunicación Relacionada en caso de Reingreso, traslados, etc</option>
                                <option value="reconocimientos_amonestaciones">Reconocimientos y Amonestaciones</option>
                                <option value="titulo_bachiller_fondonegro">Titulo de bachiller en fondonegro</option>
                                <option value="copia_titulo_bachiller">Copia de Titulo de bachiller</option>
                                <option value="copia_notas_certificadas_educacion_media">Copia de Notas Certificadas de Educación Media Diversificada</option>
                                <option value="fotocopia_partida_nacimiento">Fotocopia de Partida de Nacimiento</option>
                                <option value="planilla_rusni">Planilla Rusni</option>
                                <option value="planilla_din">Planilla De Defensa Integral de la Nación</option>




                            </select>

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