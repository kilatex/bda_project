@extends('layouts.app')


@section('content')

<div class="title text-center">
    <h2>Subir Documentos</h2>
</div>

<div class="box-content col-md-6 offset-md-3 p-4 rounded-3">
    <form method="POST" action="{{ route('subir') }}" enctype="multipart/form-data" >
    @csrf
    <div class="input-group mb-3">
        <label class="input-group-text" for="planilla_datos_personales">Planilla de Datos Personales</label>
        <input type="file" class="form-control" id="planilla_datos_personales" name="planilla_datos_personales" >
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="copia_cedula">Copia de Cédula</label>
        <input type="file" class="form-control" id="copia_cedula" name="copia_cedula">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="record_academico">Record Académico</label>
        <input type="file" class="form-control" id="record_academico"  name="record_academico">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="constancia_culminacion_servicio_comunitario">Constancia de Culminación de Servicio Comunitario</label>
        <input type="file" class="form-control" id="constancia_culminacion_servicio_comunitario"  name="constancia_culminacion_servicio_comunitario">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="acta_evaluacion_pasantias">Acta de Evaluación de Pasantias</label>
        <input type="file" class="form-control" id="acta_evaluacion_pasantias"  name="acta_evaluacion_pasantias">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="certificado_pasantias">Certificado de Pasantias</label>
        <input type="file" class="form-control" id="certificado_pasantias" name="certificado_pasantias">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="acta_defensa_trabajo_especial_grado">Acta de Defensa del Trabajo Especial de Grado</label>
        <input type="file" class="form-control" id="acta_defensa_trabajo_especial_grado" name="acta_defensa_trabajo_especial_grado">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="constancia_practicas_educativas">Constancia de Practicas Educativas</label>
        <input type="file" class="form-control" id="constancia_practicas_educativas"  name="constancia_practicas_educativas">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="acta_pasantia_hospitalaria_comunitaria">Acta de Pasantía Hospitalaria y Comunitaria</label>
        <input type="file" class="form-control" id="acta_pasantia_hospitalaria_comunitaria" name="acta_pasantia_hospitalaria_comunitaria">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="certificado_pastantia_hospitalaria_comunitaria">Certificado de Pasantías Hospitalaria y Comunitaria</label>
        <input type="file" class="form-control" id="certificado_pastantia_hospitalaria_comunitaria" name="certificado_pastantia_hospitalaria_comunitaria">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="comunicacion_adicional_casos_concretos">Comunicación Relacionada en caso de Reingreso, traslados, etc</label>
        <input type="file" class="form-control" id="comunicacion_adicional_casos_concretos"  name="comunicacion_adicional_casos_concretos">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="reconocimientos_amonestaciones">Reconocimientos y Amonestaciones</label>
        <input type="file" class="form-control" id="reconocimientos_amonestaciones" name="reconocimientos_amonestaciones">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="titulo_bachiller_fondonegro">Fondo Negro del Titulo de Bachiller</label>
        <input type="file" class="form-control" id="titulo_bachiller_fondonegro" name="titulo_bachiller_fondonegro">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="copia_titulo_bachiller">Copia del Titulo de Bachiller</label>
        <input type="file" class="form-control" id="copia_titulo_bachiller"  name="copia_titulo_bachiller">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="copia_notas_certificadas_educacion_media">Copia de las Notas Certificadas de Educacion Media Diversificada</label>
        <input type="file" class="form-control" id="copia_notas_certificadas_educacion_media" name="copia_notas_certificadas_educacion_media">
    </div>
    
    <div class="input-group mb-3">
        <label class="input-group-text" for="fotocopia_partida_nacimiento">Fotocopia de la Partida de Nacimiento</label>
        <input type="file" class="form-control" id="fotocopia_partida_nacimiento" name="fotocopia_partida_nacimiento">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="planilla_rusni">Planilla de Inscripción en el RUSNIEU</label>
        <input type="file" class="form-control" id="planilla_rusni" name="planilla_rusni">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="planilla_din">Planilla de Registro de Defensa Integral de la Nación</label>
        <input type="file" class="form-control" id="planilla_din" name="planilla_din">
    </div>

    <input type="submit" value="Enviar" class="btn btn-success btn-lg">
    
    </form>
</div>
@endsection