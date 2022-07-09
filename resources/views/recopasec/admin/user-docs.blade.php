@extends('layouts.app')

@section('content')

<div class="container-docs">
        <div class="col-md-6 offset-md-4">
            <h2>Documentos Subidos de {{ $user->name }} {{ $user->surname }} </h2>
        </div>

        @if($docs)
        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Planilla Datos Personales</h5>
            <img src="{{route('getDoc',['filename'=> $docs->planilla_datos_personales])}}" alt="" srcset="">
            
        </div>


        <div class="col-md-8  img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Copia de Cedula</h5>
            <img src="{{route('getDoc',['filename'=> $docs->copia_cedula])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Record Académico</h5>
            <img src="{{route('getDoc',['filename'=> $docs->record_academico])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Constancia de Culminación de Servicio Comunitario</h5>
            <img src="{{route('getDoc',['filename'=> $docs->constancia_culminacion_servicio_comunitario])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Acta de Evaluación de Pasantías</h5>
            <img src="{{route('getDoc',['filename'=> $docs->acta_evaluacion_pasantias])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Certificación de Pasantías</h5>
            <img src="{{route('getDoc',['filename'=> $docs->certificado_pasantias])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Acta de Defensa Trabajo Especial de Grado</h5>
            <img src="{{route('getDoc',['filename'=> $docs->acta_defensa_trabajo_especial_grado])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Constancia de Practicas Educativas</h5>
            <img src="{{route('getDoc',['filename'=> $docs->constancia_practicas_educativas])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Actia de Pasantias Hospilataria Comunitaria</h5>
            <img src="{{route('getDoc',['filename'=> $docs->acta_pasantia_hospitalaria_comunitaria])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Certificado de Pasantias Hospilataria Comunitaria</h5>
            <img src="{{route('getDoc',['filename'=> $docs->certificado_pastantia_hospitalaria_comunitaria])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Certificado de Pasantias Hospilataria Comunitaria</h5>
            <img src="{{route('getDoc',['filename'=> $docs->certificado_pastantia_hospitalaria_comunitaria])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Comunicación Relacionada en caso de Reingreso, Traslados, etc</h5>
            <img src="{{route('getDoc',['filename'=> $docs->comunicacion_adicional_casos_concretos])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Reconocimientos O Amonestaciones</h5>
            <img src="{{route('getDoc',['filename'=> $docs->reconocimientos_amonestaciones])}}" alt="" srcset="">
        </div>

        <div class="col-md-8  img-div offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Titulo de Bachiller en Fondonegro</h5>
            <img src="{{route('getDoc',['filename'=> $docs->titulo_bachiller_fondonegro])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div  offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Copia del Titulo de Bachiller</h5>
            <img src="{{route('getDoc',['filename'=> $docs->copia_titulo_bachiller])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Copia de Notas Certificadas Educación Media Diversificada</h5>
            <img src="{{route('getDoc',['filename'=> $docs->copia_notas_certificadas_educacion_media])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Fotocopia Partida de Nacimiento</h5>
            <img src="{{route('getDoc',['filename'=> $docs->fotocopia_partida_nacimiento])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Planilla de RUSNI</h5>
            <img src="{{route('getDoc',['filename'=> $docs->planilla_rusni])}}" alt="" srcset="">
        </div>

        <div class="col-md-8 img-div offset-md-2 bg-white rounded-3 p-3 mt-4 ">
            <h5>Planilla de Defensa Integral de La Nación</h5>
            <img src="{{route('getDoc',['filename'=> $docs->planilla_rusni])}}" alt="" srcset="">
        </div>

        <div class="col-md offset-md-2 mt-2 mb-2">
            <h6>¿Aprueba usted todos los documentos?</h6>
            <button class="btn btn-success"> <a href="  {{route('pass_docs',['docs_id'=> $docs->id])}}  ">Aprobar</a> </button>
            <button class="btn btn-danger" id="btn_observacion">Dejar una Observación</button >
        </div>

        <div class=" desact col-md-8 offset-md-2 form-floating" id="input_observacion">
            <form action="{{ route('send_message') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea class="form-control"  placeholder="Leave a comment here" id="message" name="message" style="height: 100px"></textarea>
            <input type="hidden" name="document_id" value="{{ $docs->id }}">
            <input type="submit" value="Enviar Observación" class="btn btn-warning mt-2"/>  
            </form>

        </div>

        @else
        <div class="col-md-8 img-div offset-md-2 bg-white rounded-3 p-3 mt-4">
            <h5> {{ $user->name }} No tiene documentos subidos </h5>
        </div>
        @endif

    </div>
    <script>
        const btn_observacion = document.querySelector('#btn_observacion');
        const input_observacion = document.querySelector('#input_observacion');


        btn_observacion.addEventListener('click', function() {
            input_observacion.classList.remove('desact');
        });
    </script>

@endsection