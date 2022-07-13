@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row">


        <div class="col-12">
            <div class=" ">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-primary  ml-4" href="/proyectos">Registrar PROYECTO</a>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('BuscarLibro') }}" class="d-flex" method="GET">
                            <div class="input-group">
                                <input type="search" name="texto" class="form-control rounded" placeholder="buscar ..." aria-label="Search" aria-describedby="search-addon" />
                                <Input type="submit" class="btn btn-outline-primary" value="Buscar " />
                            </div>
                        </form>
                    </div>
                </div>


                <div class="row  mt-3 mr-4 ml-4 ">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Autor</th>
                                <th scope="col">CI</th>
                                <th scope="col">TITULO</th>
                                <!--<th scope="col">TIPO</th>-->
                                <th scope="col">FECHA DE PRESENTACION</th>

                                <th scope="col">TIPO DE PROYECTO</th>
                                <th scope="col">opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($proyectoGrado as $prestamo)


                            <tr>
                                <th scope="row"># </th>
                                <td>{{$prestamo->autor->user->nombres}}</td>
                                <td>{{$prestamo->autor->user->cedula}}</td>
                                <td>{{$prestamo->titulo}}</td>
                                <td>{{$prestamo->fecha_presentacion}}</td>
                                <td>{{$prestamo->tipo_proyecto}}





                                <td>
                                    <div class="row">
                                        <div class="btn-group">
                                            <div class="col-4"> <a href="/EditarPrestamos/{{$prestamo->id}}" class="btn btn-primary">VER </a> </div>
                                            <!--
              <div class="col-4"><a href="{{route('deletebook',1 )}}" class=" btn btn-danger">eliminar</a></div>
              </div>
-->
                                        </div>
                                </td>
                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection