@extends('layouts.app')

@section('content')
            <div class="users-container row justify-content-center">


                   
                    @foreach($users as $user)

                        <div class="user bg-white p-4 col-md-4 rounded-3 mx-3 my-2">
                            <div class="header user-list-box d-flex mb-3">
                                @if($user->img != null)
                                <img src="{{route('img_profile',['filename'=> $user->img])}}" class="image-profile-list" alt="" srcset="">
                                @else
                                <img src="{{ asset('images/profile.png')}}" class="image-profile-list" alt="" srcset="">
                                @endif
                                <h5>{{ $user->name}} {{$user->surname}}</h5>
                            </div>

                            <a href=" {{ route('user_docs', [ 'id' => $user->user_id ]) }} ">Ver Los Documentos de Este Usuario</a>
                        </div>
                    
                    @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{$users->links()}}
            </div>
@endsection
