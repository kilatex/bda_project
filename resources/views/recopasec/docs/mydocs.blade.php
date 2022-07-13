@extends('layouts.app')

@section('content')

    <div class="container-docs">
        <div class="col-md-6 offset-md-4">
            <h2>Documentos de {{$expediente->estudiante->user->nombres}} </h2>
        </div>

        <div class="info-estudiante">
            <strong> Estudiante:  </strong>   {{$expediente->estudiante->user->nombres}}   {{$expediente->estudiante->user->apellidos}} <br>
            <strong> Cédula:  </strong>    {{$expediente->estudiante->user->cedula}} <br>
            <strong> Código de Expediente:  </strong>    {{$expediente->codigo}} <br> 

            <div>
                <strong> Estatus Expediente:  </strong>    {{$expediente->estado}} 
            
            </div>
            @if(Auth::user()->rol == "USER")

                <form method="POST" action="{{ route('change_status') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="d-flex  my-2">
                
                            <div class="col-md-4" style="margin-right: 20px">
                                <select class="form-select" name="estado" aria-label="Default select example">
                                    <option selected value="null">Cambiar de Status</option>
                                    <option value="Aprobado">Aprobado</option>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="Egresado">Egresado</option>
                                    <option value="Retirado">Retirado</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="{{$expediente->id}}">
                            <div class="col-md-4 ">
                                <input type="submit" class="btn btn-primary" value="Cambiar Status de Expediente">
                            </div>
                    </div>
                </form>
            @endif
        </div>
        @if(session('obbb')) <h4 class="text-success text-center mt-3"> <strong>OBSERVACIÓN ENVIADA</strong> </h4>  @endif 

        @foreach($docs as $doc)

            <div class="col-md-8 img-div bg-document offset-md-2 rounded-3 p-3 mt-4 ">
                <div class="titulo_documento">
                    <h5> {{$doc->nombre}} </h5>
                    <div>
                        @if(Auth::user()->rol == "USER" && $doc->estado != "Aprobado")
                        <form method="POST" action="{{ route('change_status') }}" enctype="multipart/form-data" >
                            @csrf
                            <input type="submit" class="btn btn-success " value="Aprobar Documento">
                        </form>

                        @elseif(Auth::user()->rol == "USER" && $doc->estado == "Aprobado")
                            <h6 class="text-success bg-white p-2 rounded fw-bold">DOCUMENTO APROBADO</h6>
                        @endif
                    </div>

                </div>
          
                <img src="{{route('getDoc',['filename'=> $doc->archivo])}}" alt="" srcset="">

       
            </div>
            @if(Auth::user()->rol == "USER")
               
            <div class="caja-observaciones">
                <form method="POST" action="{{ route('send_message') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="d-flex  my-2">
                            <div class="col-md-4" style="margin-right: 20px">
                                <select class="form-select" name="estado" aria-label="Default select example">
                                    <option selected value="null">Cambiar de Status</option>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="Regresado">Regresado</option>
                                    <option value="Retirado">Vencido</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="{{$doc->id}}">
                            <input type="hidden" name="usuario_id" value="{{$expediente->estudiante->user->id}}">

                            <div class="align-self-center">
                                <strong>Status:</strong>  {{$doc->estado}} <br>
                            </div>
                            <div class="col-md-4 ml-4 ">
                                <input type="submit" class="btn btn-primary" value="Enviar Observaciones y Status">
                            </div>
                    </div>
                    <div class="observaciones">
                        <div class="form-floating">
                            <textarea class="form-control"  required name="observaciones" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Observaciones</label>
                          </div>
                    </div>
                </form>

            </div>
            @endif
        @endforeach

    </div>

    <style>
        .info-estudiante{
            background: white;
            width: 50%;
            margin: 0 auto;
            padding: 10px 5px;
            border-radius: 5px;
        }
        .caja-observaciones{
            margin-top: 5px;
            background: white;
            width: 66%;
            padding: 15px 25px;
            margin: 0 auto;
        }
        .titulo_documento{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .titulo_documento div{
           position: relative;
           top: -5px;
        }
    </style>
 
@endsection