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
                            <th scope="col">Código</th>
                            <th scope="col">Estudiante</th>
                            <th scope="col">Fecha de Creación</th>
                            <th scope="col">Status</th>
                            <th scope="col">Último cambio de status</th>
                            <th scope="col">Más Info</th>

                            </tr>
                        </thead>
               

                        <tbody class="table-group-divider">
                            @foreach($expedientes as $expediente)

                            <tr>
                          
                                <th scope="row">{{$expediente->estudiante_id}}</th>
                                <td>{{$expediente->estudiante->user->nombres}} {{$expediente->estudiante->user->apellidos}}</td>
                                <td> {{date_format($expediente->created_at,'d/m/Y')}}</td>                                 
                                <td> {{$expediente->estado}}</td> 
                                <td class=""> {{date_format($expediente->updated_at,'d/m/Y')}}</td> 
                                <td>
                                 <a  href="{{route('show_expediente',['expediente_id'=> $expediente->id])}}" class="text-success"> <strong>Observar</strong> </a>
                                </td>
 

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else
                    <h2 class="text-center">Usuarios no encontrados </h2>
                    @endif
                   
                
            </div>
            <div class="d-flex justify-content-center">
             
                {{$expedientes->links()}}
            </div>
         
     
@endsection
