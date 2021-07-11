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
    
    <!--SCRIPTS DE CHART-->
    <script src="{{ asset('_gs_public/js/loader.js') }}" defer></script>
    <script src="{{ asset('_gs_public/js/bootstrap.min.js') }}" defer></script>
    
    
   <!-- <script src="{{ asset('js/jquery.min.js') }}" defer></script>-->
   <!-- <script src="{{ asset('js/dropdown.js') }}"></script>-->

    <!-- Fonts -->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!--LINK DE BOOTRAPS 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
     @notify_css
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-light text-white shadow-sm">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">Menu</span>
            </button> 
                <a class="navbar-brand" href="{{ route('home-user') }}">
                <img src="{{asset('_gs_public/img/logo.gif') }} " height="50px" width=""/> 
                   <!-- {{ config('app.name', 'Laravel') }} -->
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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else

                                 <li class="nav-item">
                                    <a class="nav-link" href="{{route('etudiant-accueil')}} "><i class="fas fa-house-user"></i>Accueil</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{route('stage-create')}} "><i class="fas fa-house-user"></i> Depot</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href=" {{route('stage-index')}} "><i class="fas fa-house-user"></i> Tableau de Bord</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href=" {{route('stage-offre')}}"><i class="fas fa-house-user"></i> Offre d'emploi</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href=" {{route('stage-contact')}}"><i class="fas fa-phone"></i> Contact</a>
                                </li>

                                <!-- FIN -->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle rounded" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-circle"></i>  {{ Auth::user()->name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                       <!--<i class="fas fa-user-slash"></i> {{ __('Quitter') }}-->
                                       <i class="fas fa-sign-out-alt"></i> {{('Deconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
    <style>
      ul li{
        margin-right: 25px;
      }
      .active{
        background: #007396;
        color: white;
        border-radius:10px;
      }
    </style>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>

<hr class="container">
<footer class="container">
    <div class="d-flex row  justify-content-between">
        <div class="col-lg-4">
        <h2>Contacts</h2>
        <ul type="none">
            <li><i class="fas fa-map-marker-alt"></i> Lorem, ipsum dolor, Lorem, ipsum. </li>
            <li><i class="fas fa-phone"></i> +33 434 2343 42332 </li>
            <li><i class="fas fa-globe"></i>  www.iaelyon.fr </li>
            <li>
            <span>Suivez-Nous : </span>
            <a href="#" class="h4 mr-4"><i class="fab fa-facebook"></i></a>
            <a href="#" class="h4 mr-4" ><i class="fab fa-twitter"></i></a>
            <a href="#" class="h4 mr-4" ><i class="fab fa-linkedin"></i></a>
            <a href="#" class="h4 mr-4" ><i class="fab fa-youtube"></i></a>
            <a href="#" class="h4 mr-4" ><i class="fab fa-instagram"></i></a>

             </li>
            <li><a href="{{ route('stage-contact') }}">Nous Contacter</a></li>
        </ul>
        </div>
        <div  class="col-lg-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ad beatae ex! Illo doloribus voluptate reprehenderit similique velit sed voluptas laboriosam iusto, dicta provident illum atque possimus nemo, quidem voluptatibus?
        <a href="#">Voir plus</a>
        </div>
    </div>
    <h6 class="text-center bg-primary text-white p-1">&copy;  Iae-Lyon <?php echo date('Y')  ?> </h6>
    @notify_js
    @notify_render
</footer>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    
<!--
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
-->

    <!-- Script javascripts  -->
    <!-- <script src="../../public/js/script.js"></script>
    <script src="../../public/js/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
</body>
</html>
