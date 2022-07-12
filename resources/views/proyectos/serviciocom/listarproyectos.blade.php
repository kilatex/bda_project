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
                <thead class="header-table">
                  <tr>
                    <th scope="col">Cédula</th>
                    <th scope="col">Nombres y Apellidos</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Más Info</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                  
                        <th scope="row">{{$user->user->cedula}}</th>
                        <td>{{$user->user->nombres}} {{$user->user->apellidos}}</td>
                        <td>{{$user->carrera->nombre}}</td>
                        <td>{{$user->user->email}}</td> 

                        <td>   
                            @if(isset($crear_comunitario))
                            <strong>El estudiante no posee un proyecto</strong>

                            @else
                            <a href="{{route('profile_se', ['id'=> $user->id])}}">
                                Más Info
                            </a>
                            @endif
                           
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
     
        {{$users->links()}}
    </div>
 <style>
    .header-table{
        background: rgb(96, 155, 255,0.2);
    }
 </style>
            
@endsection
