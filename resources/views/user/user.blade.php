@extends('layouts.app')

@section('content')

    <div class="container-profile offset-md-3 col-md-6 p-3">
        <div class="box-profile d-flex">
            <div class="image-box ">
            @if($user->img != null)
            <img src="{{route('img_profile',['filename'=> $user->img])}}" class="image-profile" alt="" srcset="">
            @else
            <img src="{{ asset('images/profile.png')}}" class="image-profile" alt="" srcset="">
            @endif
            </div>
            <div class="name offset-md-1 ">
                <h3>{{ $user->nombres}}  {{$user->apellidos}}</h3>
            </div>

         
            <div class="edit-profile offset-md-1">
                @if($user == \auth::User())
                <a href="{{route('edit_profile')}}">
                    Editar Perfil
                <i class="fas fa-user-edit"></i>
                </a>
                @endif
            </div>
         
        </div>

    </div>
    
    <div class="info-container offset-md-3 col-md-6  p-5">
            <h3>Información Adicional</h3>
            @if($user->pregrado != null || $user->periodo != null || $user->promocion != null )

                
                <h5> <strong>{{$user->nombres}} {{$user->apellidos}} </strong>
                @if($user->pregrado != null)
                 --- Estudiante de {{$user->pregrado->name}}</h5>
                @endif

                <h5>Cédula:  {{$user->cedula}}</h5>

                @if($user->periodo != null)
                <h6>Estudiante desde: {{$user->periodo->name}}</h6>
                @endif
                
                @if($user->promocion != null)
                <h6>Promoción  {{$user->promocion->name}}</h6>
                @endif
                
            @else
            <h5>     
                @if($user == \auth::User())
                <a href="{{ route('edit_profile') }}">Completa la información de tu perfil</a> 
                @endif
            </h5>
            @endif
    </div>
@endsection
