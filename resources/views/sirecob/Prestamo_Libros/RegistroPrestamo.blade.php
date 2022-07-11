@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="row">
    <div class="col-4">

    </div>
    <div class="col-4">
        <div class="card">

            <div class="card-header">
                <b>Registro de Prestamo</b>
            </div>
            <div class="">
                

                <form action="/api/Prestamo_Libros" method="post">
                    <div class="container">
                        <div class="row">


                            <div class="col-12 mt-3 mb-2" id="btnEstudiante">

                                <input style="display:none;" value="estudiante" type="radio" class="btn-check" name="valBtnPrestamista" id="danger-outlined" autocomplete="off">
                                <label class="btn btn-primary" for="danger-outlined" onclick="btncrearCliente();">Estudiantes</label>

                            </div>
                            <div class="col mb-2" id="btnDocente">
                                <input value="docente" type="radio" class="btn btn-primary" name="valBtnPrestamista" onclick="btnSelectCliente();" id="success-outlined" autocomplete="off" checked style="display: none;">
                                <label class="btn btn-primary" for="success-outlined">Docentes
                                </label>

                                <!--<button class="btn btn-success"  value="12" name="valBtnCliente" onclick="btnSelectCliente();">sleccionar Cliente</button>
                -->
                            </div>


                            <!--
    
                                <div class="col-5">
                                    <a id="Btnestudiante" onclick=" return SelecionarEstudiante();"
                                        class=" btn btn-primary">Estudiante</a>
                                    <a id="Btndocente" onclick="return SelecionarDocente();"
                                        class=" btn btn-success">Docente</a>
    
                                </div>
    
    -->
                        </div>
                        <div class="row mt-3">
                            <div id="estudiante" class="col-12">
                                <div class="row ">

                                    <label for="a">Estudiante:</label>

                                    <select class="mi-selector mt-3 ml-2 mr-2 mb-3 form-control" name="estudiante" id="a">

                                        @foreach ($Estudiante as $estudiante)
                                        <option value="{{$estudiante->id}}">{{ $estudiante->user->cedula }} {{
                                            $estudiante->user->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <div id="Docente" class="col-12">
                                <div class="row ">
                                    <div class="col-12">
                                        <label for="Docente">Docente:</label>
                                        <br>
                                        <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                            @foreach ($Docente as $docente)
                                            <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <br>



                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Libros Registrados:</label>
                                <select class="mi-selector form-control" name="libro" id="">

                                    @foreach ($Libro as $libro)
                                    <option value="{{ $libro->id }}"> {{ $libro->titulo }} //
                                        <b>Edicion:</b> {{ $libro->Datos->edicion }} // <b>Editorial:</b> {{
                                        $libro->Datos->editorial }} // <b>Año:</b> {{ $libro->Datos->año }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for=""> Fecha de prestamo:</label>
                                <input name="FechaPrestamo" class="form-control" type="date">

                            </div>
                            <div class="col-12">
                                <label for=""> Fecha de entrega:</label>
                                <input name="FechaEntrega" class="form-control" type="date">
                            </div>

                        </div>
                    </div>
                    <input type="submit" value="GUARDAR PRESTAMO" class="btn btn-primary btn-block mt-3 mb-3 mr-1 ml-1">
                </form>

            </div>

        </div>
    </div>
    <div class="col-4"></div>

</div>
<script>
    /*
    var envio = false;
    document.getElementById("Btnestudiante").style.display = "none";
    document.getElementById("Docente").style.display = "none";
    document.getElementById("Btndocente").style.display = "block";
    document.getElementById("estudiante").style.display = "block";

    function SelecionarDocente() {
        document.getElementById("Btnestudiante").style.display = "block";
        document.getElementById("Docente").style.display = "block";
        document.getElementById("Btndocente").style.display = "none";
        document.getElementById("estudiante").style.display = "none";
        return envio;

       
    }
     function SelecionarEstudiante() {
            document.getElementById("Btnestudiante").style.display = "none";
            document.getElementById("Docente").style.display = "none";
            document.getElementById("Btndocente").style.display = "block";
            document.getElementById("estudiante").style.display = "block";
        }
 
*/
    //Code RadioButton

    document.getElementById("btnEstudiante").style.display = "block";
    document.getElementById("btnDocente").style.display = "none";
    //divs
    document.getElementById("Docente").style.display = "block";
    document.getElementById("estudiante").style.display = "none";
    valorbtnClient = 2;

    function btncrearCliente() {
        //btns
        valorbtnClient = 1;
        document.getElementById("btnEstudiante").style.display = "none";
        document.getElementById("btnDocente").style.display = "block";
        //divs
        document.getElementById("Docente").style.display = "none";
        document.getElementById("estudiante").style.display = "block";
        valorbtnClient = 2;
    }

    function btnSelectCliente() {
        document.getElementById("btnEstudiante").style.display = "block";
        document.getElementById("btnDocente").style.display = "none";
        //divs
        document.getElementById("Docente").style.display = "block";
        document.getElementById("estudiante").style.display = "none";
        valorbtnClient = 2;

    }



    jQuery(document).ready(function($) {
        $(document).ready(function() {
            $('.mi-selector').select2();
        });
    });
</script>
@endsection