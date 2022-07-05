@extends('layouts.app')

@section('content')

<div class="container" id="app">
    <div class="row">
        <div class="col-6">
            <a href="/Registro_DET" class="btn btn-warning "><b><</b></a>
        </div>
    <div class="col-6"> <h2> <b>Registro de Proyectos de Grado</b> </h2></div>  </div>
    <div class="container">
        <div class="card">
            <form action="" method="post">
                <div class="row">
                    <div class="col-9 mt-5 mb-5 ml-5 mr-5">
                        
                        <div class="text-center">
                            <input type="radio" id="pasantias" name="fav_language" value="informe Practica Profesional">
                        <label for="pasantias">Informe de Practica Porfesional</label><br>
<input type="radio" id="tesis" name="fav_language" value="tesis">
<label for="tesis">Tesis Doctoral</label><br>
<input type="radio" id="ProyectoGrado" name="fav_language" value="Proyecto Especial De Grado">
<label for="ProyectoGrado">Proyecto Especial de Grado</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-3 ml-2 mr-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Titulo del proyecto:</label>
                            <input type="text" class="form-control" placeholder="Ingrese el titulo del proyecto">
                        
                        </div>
                    </div>
                   

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Fecha de Presentacion:</label>
                            <input type="date" class="form-control" >
                        
                        </div>
                    </div>
                </div>
                
                
                
                <input type="submit" class="btn btn-primary btn-block" value="Guardar Proyecto">
            </form>
        </div>
    </div>
        

    </div>
</div>
@endsection