@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Notificación') }}</div>

                    <div class="card-body">


                        <div class="alert alert-warning" role="alert">

                                    <strong>   {{ session('message') }} </strong>
                            </div>

                    
                    </div>
                </div>
                
            </div>
        </div>
    @endif

    @if($observaciones)
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Notificación') }}</div>

                    <div class="card-body">
                    
                    <div class="alert alert-warning">
                        Tienes una observación sobre tus documentos subidos
                        a la plataforma, <a href=" {{route('notification')}} " style="font-weight:bold;"> Haz click para más información</a>
                    </div>           
                    
                    </div>
                </div>
                
            </div>
    </div>
    @endif
    @include('includes.home')
</div>
@endsection
