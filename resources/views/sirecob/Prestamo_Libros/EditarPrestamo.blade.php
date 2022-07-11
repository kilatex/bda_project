@extends('layouts.app') @section('content')

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <b>Editar Prestamo</b>
            </div>
            <div class="container">
                
                <form action="{{route('updatePrestamo', $editar->id )}}" method="put">
                    <div class="row">
                        <div class="col-12">
                            <select class="form-control mt-2" name="estado" id="estado">
                                <option value="prestado">Prestado</option>
                                <option value="entregado">Entregado</option>
                            </select>
                        </div>
                    </div>
                    <hr style=" margin-top: 1rem;
                    margin-bottom: 1rem;
                    border: 0;
                    border-top: 1px solid rgba(0, 0, 0, 0.1);"/>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Nombre:</label>
                            <input
                                disabled
                                type="text"
                                value="{{$editar->Datos_docente->user->nombres}}"
                                class="form-control"
                            />
                        </div>
                        <div class="col-6">
                            <label for="">Ci:</label>
                            <input
                                disabled
                                type="text"
                                value="{{$editar->Datos_docente->user->cedula}}"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Telefono:</label>
                            <input
                                disabled
                                type="text"
                                value="{{$editar->Datos_docente->user->telefono}}"
                                class="form-control"
                            />
                        </div>
                        <div class="col-6">
                            <label for="">Correo:</label>
                            <input
                                disabled
                                type="text"
                                value="{{$editar->Datos_docente->user->email}}"
                                class="form-control"
                            />
                        </div>
                    </div>

                    <hr style=" margin-top: 1rem;
                    margin-bottom: 1rem;
                    border: 0;
                    border-top: 1px solid rgba(0, 0, 0, 0.1);"/>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Libro Prestado:</label>
                            <input
                                disabled
                                type="text"
                                value="{{$editar-> Datos_libros->titulo}}"
                                class="form-control"
                            />
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="">editorial:</label>
                            <input
                                disabled
                                type="text"
                                value="{{$editar->Datos_libros->Datos->edicion}}"
                                class="form-control"
                            />
                        </div>
                        <div class="col-4">
                            <label for="">edicion:</label>
                            <input
                                disabled
                                type="text"
                                value="{{$editar->Datos_libros->Datos->edicion}}"
                                class="form-control"
                            />
                        </div>
                        <div class="col-4">
                            <label for="">autor:</label>
                            <input
                                disabled
                                type="text"
                                value="{{$editar->Datos_libros->Datos->autor}}"
                                class="form-control"
                            />
                        </div>
                        </div>
                    </div>

                    <input
                        type="submit"
                        value="GUARDAR PRESTAMO"
                        class="btn btn-primary btn-block mt-3 mb-3 mr-1 ml-1"
                    />
                </form>
            </div>
        </div>
    </div>
    <div class="col-4"></div>
</div>

@endsection
