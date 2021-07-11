<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
   <!-- <script src="{{ asset('js/jquery.min.js') }}" defer></script>-->
   <!-- <script src="{{ asset('js/dropdown.js') }}"></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--Ultimo link adicionada-->
    <!--
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
-->
    <!--LINK DE BOOTRAPS 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <!--<a class="navbar-brand" href="{{ url('/') }}">-->
                <a class="navbar-brand" href="{{route('home-admin')}}">
                <img src="{{ asset('img/_logo-cne.png') }}"/> 
                   <!-- {{ config('app.name', 'Laravel') }}-->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-log"></i>
                                    {{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home-admin') }}"><i class="fas fa-home"></i> Home</a>
                                </li>
                                  <li class="nav-item">
                                    <a class="nav-link"  href=""><i class="fas fa-home"></i>Accueill</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user-index') }}"><i class="fas fa-users"></i> Users</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('prof-index') }}"><i class="fas fa-house-user"></i>Enseignants</a>
                                </li>
                                 
                                
                            <!--Debut dropDown election
                             <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-circle"></i>  Election
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('typeElection-index') }}"> <i class="fas fa-eye"></i> Type Election</a>

                                    <a class="dropdown-item" href="{{ route('election-index') }}">
                                    <i class="fas fa-laptop-house"></i> Election</a> 
                                   
                                   
                                    <a class="dropdown-item" href="{{ route('candidat-index') }}">
                                    <i class="fas fa-users"></i>Candidats</a> 
                                   
                                   
                                    <a class="dropdown-item" href="{{ route('candidatElection-index') }}">
                                    <i class="fas fa-people-arrows"></i> Cand. Election</a> 

                                
                                   
                                </div>
                            </li> 
                            Fin dropDown election -->
                            
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('typeElection-index') }}"><i class="fas fa-eye"></i> Type Election</a> 
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('election-index') }}"><i class="fas fa-laptop-house"></i> Election</a> 
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('candidat-index') }}"><i class="fas fa-users"></i>Candidats</a> 
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('candidatElection-index') }}"><i class="fas fa-people-arrows"></i> Cand. Election</a> 
                                    
                                </li>
                            
                                <!--
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('rb-index') }}"><i class="fas fa-trash"></i> RB</a>                                   
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('rc-index') }}"><i class="fas fa-trash"></i> RC</a>                                   
                                </li>
                                -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-circle"></i>  {{ Auth::user()->name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                       <i class="fas fa-user-slash"></i> {{ __('Quitter') }}
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
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
<!--
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
-->
</body>
</html>
