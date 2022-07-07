@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-4">

    </div>
    <div class="col-4">
        <div class="card">

            <div class="card-header">
                <b>Registro de Prestamo</b>
              </div>
            <div class="">


                <form action="/api/Prestamo_Libros" method="post">
                @foreach ($prestamos as $prestamo)

<h1>{{$prestamo}}</h1>

@endforeach
                    <input type="submit" value="GUARDAR PRESTAMO" class="btn btn-primary btn-block mt-3 mb-3 mr-1 ml-1">
                </form>

            </div>

        </div>
    </div>
    <div class="col-4"></div>

</div>

@endsection
