@extends('layouts.app')

@section('content')

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Libro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="api/libros" method="POST">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Titulo del Liro:</label>
                        <input type="text" name="titulo" placeholder="Titulo del Libro" class="form-control" id="titulo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Cetegoria</label>
                        <input type="text" placeholder="Categoria " class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Titulo del Liro:</label>
                        <input type="text" placeholder="Titulo de la Obra" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Autor</label>
                        <input type="text" placeholder="Autor de la Obra" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Editorial</label>
                        <input type="text" placeholder=" Editorial .." class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Año</label>
                        <input type="text" class="form-control" placeholder="Año de Publicacion" id="inputEmail4">
                    </div>
                </div>
            </form>

          
          <input type="submit" class="btn btn-primary btn-block">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



<div class="" >
<div class="row">
    
    
    <div class="col-12">
        <div class=" ">
            <div class="row mr-4 ml-4 ">
              <div class="col-5">
                <a href="/RegistroLibro" class="btn btn-primary"> Registro Libro</a>
           
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
      <tr  >
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
               <a href="{{route('editarlibro', $libro->id )}}"  class="btn btn-primary">editar</a> 
              
              <a href="{{route('deletebook', $libro->id )}}" class=" btn btn-danger">eliminar</a>
              </div>
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
