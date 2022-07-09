@extends('layouts.app')

@section('content')


        <div class="col-md-6 offset-md-3 mb-4  d-block">
            <form action="{{ route('search') }}" class="d-flex" method="GET">
                <label for="">Buscar Usuarios</label>
                <input class="form-control me-2" name="texto" type="search" placeholder="Buscar Usuarios" aria-label="Search">
                <input type="submit" value="Buscar" class="btn btn-success mt-2 ">
            </form>
        </div>

            <div class="container">

                    @if($field_name != false )
                        <h2 class="text-center">{{$field_name}} </h2>
                    @endif

                

                    @if(count($expedientes) >=1)
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombres y Apellidos</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Status</th>
                            <th scope="col">Más Info</th>

                            </tr>
                        </thead>
               
                        @foreach($expedientes as $expediente)

                        <tbody class="table-group-divider">
                            <tr>
                          
                                <th scope="row">{{$expediente->estudiante_id}}</th>
                                <td>{{$expediente->estudiante->user->nombres}} {{$expediente->estudiante->user->apellidos}}</td>
                                <td>{{$expediente->estudiante->carrera->nombre}}</td>
                                <td> {{$expediente->estado}}</td> 
                                <td>
                                    <a  href="{{route('show_expediente',['expediente_id'=> $expediente->id])}}" class="text-success"> <strong>Observar</strong> </a>
                                    <a href="#" class="text-primary"> <strong>Editar</strong> </a>
                                    <a  href="{{route('delete_expediente',['expediente_id'=> $expediente->id])}}" class="text-danger"> <strong>Eliminar</strong> </a>
                                </td>
 

                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                    @else
                    <h2 class="text-center">Usuarios no encontrados </h2>
                    @endif
                   
                
            </div>
            <div class="d-flex justify-content-center">
             
                {{$expedientes->links()}}
            </div>
         
            
@endsection
