@extends('layouts.app')

@section('content')
<div class="text-center">
    
</div>
<div class="container">
    <div class="card">

        <div class="card-header">
            <b>regsitro de libros</b>
          </div>
        <div class="">


            <form action="/api/libros" method="post">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="categoria">Categoria</label>
                                <input type="text" class="form-control" name="categoria" id="" placeholder="Categoria">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="cantidad">cantidad</label>
                                <input type="text" class="form-control" name="cantidad" id="" placeholder="cantidad">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="editorial">editorial</label>
                                <input type="text" class="form-control" name="editorial" id="" placeholder="editorial">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="editorial">autor</label>
                                <input type="text" class="form-control" name="autor" id="" placeholder="autor">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo">año</label>
                                <input type="text" class="form-control" name="año" id="" placeholder="año">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo">seccion</label>
                                <input type="text" class="form-control" name="seccion" id="" placeholder="seccion">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo">pais</label>
                                <input type="text" class="form-control" name="pais" id="" placeholder="pais">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check">
                                <label for="titulo">edicion</label>
                                <input type="text" class="form-control" name="edicion" id="" placeholder="edicion">
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