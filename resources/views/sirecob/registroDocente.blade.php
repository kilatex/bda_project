@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-6">
            <a href="/Registro_DET" class="btn btn-warning "><b><</b></a>
        </div>
    <div class="col-6"> <h2> <b>Docentes</b> </h2></div>  </div>
    <div class="row justify-content-center">
        <docentes><docentes/>

    </div>
</div>
@endsection
