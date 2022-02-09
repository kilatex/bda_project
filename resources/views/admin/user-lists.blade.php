@extends('layouts.app')

@section('content')
           
            <div class="users-container row justify-content-center">

                    @if($field_name != false )
                        <h2 class="text-center">Listado de Usuarios por  {{$category}} : {{$field_name}} </h2>
                    @endif

                   
                    @foreach($users as $user)

                        <div class="user bg-white p-3 col-md-3 rounded-3 mx-3 my-2">
                            <div class="header user-list-box d-flex mb-3">
                                @if($user->img != null)
                                <img src="{{route('img_profile',['filename'=> $user->img])}}" class="image-profile-list" alt="" srcset="">
                                @else
                                <img src="{{ asset('images/profile.png')}}" class="image-profile-list" alt="" srcset="">
                                @endif
                                <h5>{{ $user->name}} {{$user->surname}}</h5>
                            </div>

                            <a href=" {{ route('user_docs', [ 'id' => $user->id ]) }} ">Ver Los Documentos de Este Usuario</a>
                        </div>
                    
                    @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{$users->appends(['field' => $user->$type->id])->appends(['type' => $type])->links()}}
            </div>
         
            
@endsection
