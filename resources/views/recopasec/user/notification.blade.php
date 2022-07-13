@extends('layouts.app')

@section('content')
<div class="container">
    
<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Notificación') }}</div>

                    <div class="card-body">
                    
                        <div class="alert alert-warning">
                            <h5> <strong>Observación sobre los documentos subidos</strong> </h5>
                           
                                @foreach($notifications as $notification)
                                <ul>
                                    <li> <strong>Nombre del Documento: </strong> {{$notification->documento->nombre}} </li> 
                                    <li> <strong>Status: </strong> {{$notification->documento->estado}} </li> 
                                    <li> <strong>Observación: </strong> {{$notification->message}} </li> 
                                </ul>
                                @endforeach
                           
                         
                        </div>           

                       <a href=" {{ route('modify') }} " class="btn btn-warning">Ir a Resubir los Documentos</a>
                    </div>
                </div>
                
            </div>
    </div>
</div>
@endsection