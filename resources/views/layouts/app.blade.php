<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSRF Token -->
    <link rel="icon" href="{{ asset('images/unefa-logo.ico') }}">

    <title>{{ config('app.name', 'UNEFA APP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/f26a62c07c.js" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-color navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{  asset('images/unefa-logo.png') }}" class=" img-logo" alt="" srcset="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto  ">
                        <!-- Authentication Links -->
                        @guest
                                @if (Route::has('login'))
                                                             
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                                    </li>
                                @endif

                            @else
                            @if(Auth::user()->rol == "USER_comunitario")
                            <li class="nav-item ">
                                <a id="" class="nav-link "  href="{{ route('students_list') }}" >
                                Estudiantes
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a id="" class="nav-link "  href="{{ route('category_users') }}" >
                                Carreras
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a id="" class="nav-link "  href="{{ route('proyecto_list') }}" >
                                    Proyectos
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a id="" class="nav-link "  href="{{ route('create_tutorcom') }}" >
                                Nuevo Proyecto
                                </a>
                            </li>

                            @elseif(Auth::user()->rol == "USER_pasantias")

                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('students_list') }}" >
                                    Estudiantes
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('category_users') }}" >
                                    Carreras
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('proyecto_listp') }}" >
                                        Proyectos
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('create_tutorin') }}" >
                                    Nuevo Proyecto
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->rol == "STUDENT")
                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('home') }}" >
                                    Inicio
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('upload') }}" >
                                    Subir Documentos
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('my_docs') }}" >
                                    Mis Documentos
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a id="" class="nav-link " href="{{ route('profile', ['id' => Auth::user()->id]) }}"  >
                                    Mi Perfil
                                    </a>
                                </li>

            

                                <li class="nav-item dropdown ">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->nombres }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right k" aria-labelledby="navbarDropdown">
 
                                        <a class="dropdown-item text-black" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Salir') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            @elseif(Auth::user()->rol == "USER")

                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('students_list') }}" >
                                    Estudiantes     
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('category_users') }}" >
                                    Carreras
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('expedientes_list') }}" >
                                    Expedientes
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('select_user_to_new_file') }}" >
                                    Nuevo Expediente
                                    </a>
                                </li>
                            
                                <li class="nav-item ">
                                    <a id="" class="nav-link "  href="{{ route('verificar_cedula') }}" >
                                    Registrar Estudiante
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->nombres }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item text-black" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Salir') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @livewireScripts
</body>
</html>
