@extends('layouts.app')

@section('content')



<div class="">
  <div class="row">


    <div class="col-12">
      
        <div class="row mr-4 ml-4 ">
          <div class="col-5">
            <a href="/Registro_libros" class="btn btn-primary"> Libros Activos</a>

          </div>
         <div class="col-6">
         <form action="{{ route('BuscarLibro') }}" class="d-flex" method="GET">
<div class="input-group">
  <input type="search" name="texto" class="form-control rounded" placeholder="buscar ..." aria-label="Search" aria-describedby="search-addon" />
  <Input type="submit" class="btn btn-outline-primary" value="Buscar  Autor"/>
</div>
</form>
         </div>
            
          
        </div>



        <div class="row  mt-3 mr-4 ml-4 ">
          <table class="table">
            <thead class="thead bg-primary text-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Edicion</th>
                <th scope="col">Autor</th>
                <th scope="col">Editorial</th>
                <th scope="col">año</th>
                <th scope="col">seccion</th>
                <th scope="col">Categoria</th>
                <th scope="col">Pais</th>
                <th scope="col">Cantidad</th>
                <th scope="col">opciones</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($libros as $libro)
              @if($libro->estado == 'inactivo')
              <tr>
                <th scope="row"># </th>
                
                <td>{{$libro->titulo}}</td>
                <td>{{$libro->Datos->edicion}}</td>
                <td>{{$libro->Datos->autor}}</td>
                <td>{{$libro->Datos->editorial}}</td>
                <td>{{$libro->Datos->year}}</td>
                <td>{{$libro->Datos->seccion}}</td>
                <td> {{$libro->Datos->categoria}}</td>
                <td>{{$libro->Datos->pais}}</td>
                <td> {{$libro->Datos->cantidad}}</td>
                <td>
                  <div class="row">
                    <div class="btn-group">
                    
                      <a href="{{route('editarlibro', $libro->id )}}" class="btn btn-primary">editar</a>

                      <a href="{{route('deletebook', $libro->id )}}" class=" btn btn-danger">eliminar</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endif
              @endforeach



            </tbody>
          </table>
        </div>
      
    </div>
  </div>

  @endsection