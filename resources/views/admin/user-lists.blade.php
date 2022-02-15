@extends('layouts.app')

@section('content')


        <div class="col-md-6 offset-md-3 mb-4  d-block">
            <form action="{{ route('search') }}" class="d-flex" method="GET">
                <label for="">Buscar Usuarios</label>
                <input class="form-control me-2" name="texto" type="search" placeholder="Buscar Usuarios" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>
        </div>

            <div class="users-container row justify-content-center">

                    @if($field_name != false )
                        <h2 class="text-center">Listado de Usuarios por  {{$category}} : {{$field_name}} </h2>
                    @endif



                    @if(count($users) >=1)
                        @foreach($users as $user)

                        <div class="user bg-white p-3 col-md-3 rounded-3 mx-3 my-2">
                            <div class="header user-list-box d-flex mb-3">
                                @if($user->img != null)
                                <img src="{{route('img_profile',['filename'=> $user->img])}}" class="image-profile-list" alt="" srcset="">
                                @else
                                <img src="{{ asset('images/profile.png')}}" class="image-profile-list" alt="" srcset="">
                                @endif
                                
                                <h5>  <a href="{{ route('profile',['id' => $user->user_id]) }}">{{ $user->name}} {{$user->surname}}  </a>  </h5>
                            </div>

                            <a href=" {{ route('user_docs', [ 'id' => $user->user_id ]) }} ">Ver Los Documentos de Este Usuario</a>
                        </div>
                    
                    @endforeach
                    @else
                    <h2 class="text-center">Usuarios no encontrados </h2>
                    @endif
                   
                
            </div>
            <div class="d-flex justify-content-center">
                @if($type)
                {{$users->appends(['field' => $user->$type->id])->appends(['type' => $type])->links()}}
                @else
                {{$users->links()}}
                @endif
            </div>
         
            
@endsection
