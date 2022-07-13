@extends('layouts.app')

@section('content')

<div class="container" id="app">
    <div class="row">
        <div class="col-6">
            <a href="/Registro_DET" class="btn btn-warning "><b>
                    << /b></a>
        </div>
        <div class="col-6">
            <h2> <b>Registro de Proyectos de Grado</b> </h2>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <form action="/api/Proyectos_Grado" method="POST">
                <div class="row mt-2 mb-2 mr-2 ml-2">
                    <div class="col-9 mt-5 mb-5 ml-5 mr-5">
                        <div id="estudiante" class="col-12">
                            <div class="row  mt-2 mb-2 mr-2 ml-2">

                                <label for="a">Autor del Proyecto:</label>

                                <select class="mi-selector mt-3 ml-2 mr-2 mb-3 form-control" name="autor" id="a">

                                    @foreach ($Estudiante as $estudiante)
                                    <option value="{{$estudiante->id}}">{{ $estudiante->user->cedula }} {{
                                            $estudiante->user->nombres }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="text-center">
                            <div class="row">
                                <div class="col-4">
                                    <input checked onclick="handleClick(this);" type="radio" id="pasantias" name="fav_language" value="informe Practica Profesional">
                                    <label for="pasantias">Informe de Practica Porfesional</label><br>
                                </div>
                                <div class="col-4">
                                    <input onclick="handleClick(this);" type="radio" name="fav_language" value="tesis">
                                    <label for="tesis">Tesis Doctoral</label><br>
                                </div>
                                <div class="col-4">
                                    <input onclick="handleClick(this);" type="radio" id="Proyecto" name="fav_language" value="Proyecto Especial De Grado">
                                    <label for="ProyectoGrado">Proyecto Especial de Grado</label>
                                </div>

                            </div>

                        </div>
                        <div class="row mt-2 mb-2 mr-2 ml-2">
                            <div class="col-12" id="informe">
                                <div class="card">
                                    <div class="row mt-2 mb-2 mr-2 ml-2">
                                        <div class="col-6">
                                            <Label>Tutor Academico</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">

                                            <Label>Tutor Institucional</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($tutorInstitucional as $tutor)
                                                <option value="{{ $tutor->id }}">{{$tutor->nombres}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row"> </div>
                                </div>
                            </div>
                            <div class="col-12" id="tesis">
                                <!--TESIS DOCTORAL -->
                                <div class="card">
                                    <div class="row mt-2 mb-2 mr-2 ml-2">
                                        <div class="col-12">
                                            <Label>jurado 1</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <Label>jurado 2</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <Label>jurado 3</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <Label>jurado 4</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <Label>jurado 5</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row"> </div>
                                </div>
                            </div>

                            <div class="col-12" id="ProyectosG">
                            <div class="col-12">
                                            <Label>jurado 1</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <Label>jurado 2</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <Label>jurado 3</Label>
                                            <select class="mi-selector mt-3  mb-3 form-control" name="docente" id="a">

                                                @foreach ($Docente as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->user->cedula }} {{ $docente->user->nombres }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-3 ml-2 mr-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Titulo del proyecto:</label>
                            <input type="text" name="Titulo" class="form-control" placeholder="Ingrese el titulo del proyecto">

                        </div>
                    </div>


                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Fecha de Presentacion:</label>
                            <input type="date" class="form-control">

                        </div>
                    </div>
                </div>


                <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-block" value="Guardar Proyecto">
                </div>

            </form>
        </div>
    </div>


</div>
</div>
<script>
    document.getElementById("tesis").style.display = "none";
    document.getElementById("informe").style.display = "block";
    document.getElementById("ProyectosG").style.display = "none";
    function handleClick(myRadio) {
        var CampoAgenteInd = document.getElementById("tesis");
        var AgenciasSelect = document.getElementById("informe");


//ProyectosG

        var valueRadio = myRadio.value;
        if (valueRadio == 'tesis') {
            valorderadiobtn = 'tesis';
            document.getElementById("tesis").style.display = "block";
            document.getElementById("informe").style.display = "none";
            document.getElementById("ProyectosG").style.display = "none";
        } else if (valueRadio == 'informe Practica Profesional') {
            valorderadiobtn = 'informe Practica Profesional';
            document.getElementById("tesis").style.display = "none";
            document.getElementById("informe").style.display = "block";
            document.getElementById("ProyectosG").style.display = "none";
            
        }else if (valueRadio == 'Proyecto Especial De Grado') {
            valorderadiobtn = 'Proyecto Especial De Grado';
            document.getElementById("tesis").style.display = "none";
            document.getElementById("informe").style.display = "none";
            document.getElementById("ProyectosG").style.display = "block";
            
        }  
        else {
            document.getElementById("tesis").style.display = "block";
            document.getElementById("informe").style.display = "none";

        }


    }
</script>
@endsection