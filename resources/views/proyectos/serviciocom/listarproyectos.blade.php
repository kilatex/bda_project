@extends('layouts.app')

@section('content')


        <div class="col-md-6 offset-md-3 mb-4  d-block">
            <form action="{{ route('search') }}" class="d-flex" method="GET">
                <label for="">Buscar el proyecto de un estudiante</label>
                <input class="form-control me-2" name="texto" type="search" placeholder="Cédula del estudinate" aria-label="Search">
                <input type="submit" value="Buscar" class="btn btn-success mt-2 ">
            </form>
        </div>

            <div class="container">

                    @if($field_name != false )
                        <h2 class="text-center">Seleccione un proyecto para agregar estudiantes</h2>
                    @endif

                

                    @if(count($comunitarios) >=1)
                    <table class="table">
                        <thead class="header-table">
                          <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Título</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Más Info</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($comunitarios as $comunitario)
                            <tr>
                          
                                <th scope="row">{{$comunitario->proyecto->codigo}}</th>
                                <td>{{$comunitario->proyecto->titulo}}</td>
                                <td>{{$comunitario->direccion->periodo}}</td>

                                <td>   
                                    <a href="{{route('profile', ['id'=> $comunitario->id])}}">
                                        Más Info
                                    </a>
                                </td> 
                            
 

                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                
                    @else
                    <h2 class="text-center">Proyecto no encontrados </h2>
                    @endif
                   
                
            </div>
            <div class="d-flex justify-content-center">
             
                {{$comunitarios->links()}}
            </div>
         <style>
            .header-table{
                background: rgb(96, 155, 255,0.2);
            }
         </style>
            
@endsection
