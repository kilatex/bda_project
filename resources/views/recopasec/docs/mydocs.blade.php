@extends('layouts.app')

@section('content')

    <div class="container-docs">
        <div class="col-md-6 offset-md-4">
            <h2>Documentos de {{$expediente->estudiante->user->nombres}} </h2>
        </div>

        @foreach($docs as $doc)

          
            <div class="col-md-8 img-div bg-document offset-md-2 rounded-3 p-3 mt-4 ">
                <h5> {{$doc->nombre}} </h5>
                <img src="{{route('getDoc',['filename'=> $doc->archivo])}}" alt="" srcset="">
            </div>
        @endforeach

    </div>

@endsection