@extends('layouts.app')

@section('content')





<div class="">
  <div class="row">


    <div class="col-12">
      <div class=" ">
        <!--
            <div class="row mr-4 ml-4 ">
              <a href="/Registro_Prestamo" class="btn btn-success"> Registrar Prestamo</a>
            </div>
             -->
        <a class="btn btn-primary  ml-4" href="/Registro_Prestamo">Registrar Prestamo</a>
        <a href="" class="  btn btn-success"> libros entregados</a>
        <a href="/Libros_Pendiente" class="  btn btn-danger"> libros pendientes</a>
        <div class="row  mt-3 mr-4 ml-4 ">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">CI PRESTAMISTA</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">TIPO</th>
                <th scope="col">lIBRO PRESTADO</th>
                <th scope="col">FECHA DE PRESTAMO</th>
                <th scope="col">FECHA DE ENTREGA</th>
                <th scope="col">ESTADO</th>

                <th scope="col">opciones</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($prestamos as $prestamo)
              @if($prestamo->estado =='entregado' )
              @isset($prestamo->Datos_estudiante->user)
              <tr>
                <th scope="row"># </th>
                <td>{{$prestamo->Datos_estudiante->user->nombres}}</td>
                <td>{{$prestamo->Datos_estudiante->user->cedula}}</td>
                <td>Estudainte</td>
                <td>{{$prestamo->Datos_libros->titulo}}</td>


                <td>{{$prestamo->fecha_prestamo}}</td>
                <td>{{$prestamo->fecha_entrega}}></td>
                <td>{{$prestamo->estado}}</td>


                <td>
                  <div class="row">
                    <div class="btn-group">
                      <div class="col-4"> <a href="/editarEstadoPrestamo/{{ $prestamo->id }}" class="btn btn-primary">editar</a> </div>

                      <div class="col-4"><a href="{{route('deletebook',1 )}}" class=" btn btn-danger">eliminar</a></div>
                    </div>
                  </div>
                </td>
              </tr>
              @endisset
            
              @isset($prestamo->Datos_docente->user)
              <tr>
                <th scope="row"># </th>
                <td>{{$prestamo->Datos_docente->user->nombres}}</td>
                <td>{{$prestamo->Datos_docente->user->cedula}}</td>
                <td>Estudainte</td>
                <td>{{$prestamo->Datos_libros->titulo}}</td>


                <td>{{$prestamo->fecha_prestamo}}</td>
                <td>{{$prestamo->fecha_entrega}}></td>
                <td>{{$prestamo->estado}}</td>


                <td>
                  <div class="row">
                    <div class="btn-group">
                      <div class="col-4"> <a href="/EditarPrestamos/{{$prestamo->id}}" class="btn btn-primary">editar</a> </div>
                      <!--
              <div class="col-4"><a href="{{route('deletebook',1 )}}" class=" btn btn-danger">eliminar</a></div>
              </div>
-->
                    </div>
                </td>
              </tr>
              @endisset
              @endif
              @endforeach



            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @endsection