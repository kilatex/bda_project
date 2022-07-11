@extends('layouts.app')

@section('content')
<div class="text-center">
    <h3 class="text-primary"><b>Editar Libro</b></h3>
</div>
<div class="container">
    <div class="card">


        <div class="">


            <form action="{{route('update', $editar->id )}}" method="put">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group form-check">
                                <label for="titulo"><b>Titulo</b>   </label>
                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" value="{{$editar->titulo}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-check">
                                <label for="categoria"><b>Categoria</b> </label>
                                <input type="text" class="form-control" name="categoria" id="" placeholder="Categoria" value="{{$editar->Datos->categoria}}">
                            </div>
                        </div>
                        <!--
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="cantidad"><b>cantidad</b></label>
                                <input type="text" class="form-control" name="cantidad" id="" placeholder="cantidad" value="{{$editar->Datos->cantidad}}">
                            </div>
                        </div>
-->
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="editorial"><b>editorial</b></label>
                                <input type="text" class="form-control" name="editorial" id="" placeholder="editorial" value="{{$editar->Datos->editorial}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="editorial"><b>autor</b></label>
                                <input type="text" class="form-control" name="autor" id="" placeholder="autor" value="{{$editar->Datos->autor}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo"><b>año</b></label>
                                <input type="text" class="form-control" name="año" id="" placeholder="año" value="{{$editar->Datos->año}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo"><b>seccion</b></label>
                                <input type="text" class="form-control" name="seccion" id="" placeholder="seccion" value="{{$editar->Datos->seccion}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo"><b>pais</b></label>
                                <input type="text" class="form-control" name="pais" id="" placeholder="pais" value="{{$editar->Datos->pais}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo"><b>edicion</b></label>
                                <input type="text" class="form-control" name="edicion" id="" placeholder="edicion" value="{{$editar->Datos->edicion}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <input type="submit" value="Guardar Registro"
                                class=" mr-5 mb-3 ml-5 mt-3 btn btn-fluid btn-primary">

                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>


@endsection