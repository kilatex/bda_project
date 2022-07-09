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

                

                    @if(count($users) >=1)
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombres y Apellidos</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Más Info</th>

                            </tr>
                        </thead>
               
                        @foreach($users as $user)

                        <tbody class="table-group-divider">
                            <tr>
                          
                                <th scope="row">{{$user->cedula}}</th>
                                <td>{{$user->nombres}} {{$user->apellidos}}</td>
                                <td>Semestre s</td>  
                                <td>{{$user->email}}</td> 
                                <td>   
                                    @if(isset($crear_expediente))
                                    <a href="{{route('upload',['user'=>'2'])}}">
                                        Crear Expediente
                                    </a>

                                    @else
                                    <a href="#">
                                        Más Info
                                    </a>
                                    @endif
                                   
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
             
                {{$users->links()}}
            </div>
         
            
@endsection
