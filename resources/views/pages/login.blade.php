<?php
//require_once '../../controller/Routes.php';    
?>
<!DOCTYPE html>
<html lang="fr">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Stage</title>
    <!-- Styles css -->

    <link rel="shortcut icon" href="{{ asset('_gs_public/img/favicon.ico') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ asset('_gs_public/css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('_gs_public/css/bootstrap.min.css') }}"> --}}
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container text-white">
    <div class="d-flex align-items-center flex-column justify-content-center my-5">
        <img src="{{ asset('_gs_public/img/logo.gif') }} " alt="logo" width="300px" width="300px" class="img">
        <h1 class="text-white mt-4">Authentification</h1>    
        <form action="#" method="post" class="col-5">    
                        <div class="form-group m-2 p-2 rounded-lg">
                            <input type="text" class="form-control" name="login" placeholder="login" required/>
                        </div>
                        <div class="form-group m-2 p-2" >
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required />
                        </div>
                        <div class="form-group m-2 p-2 text-center">
                    <button class="btn btn-info btn-lg " type="submit">Se connecter</button>
                        </div>
                        <div class="form-group m-2 p-2">
                            <a href="#" class=" text-white">Mot de passe oublié ?</a>
                        </div>
        </form> 

        <!--
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis excepturi tenetur iusto omnis amet eveniet natus doloribus? Facilis, quis tenetur quidem sequi illo odit praesentium in consequatur voluptate ab architecto.
            Sapiente, nihil unde. Earum, a voluptates vero doloremque, autem odit doloribus debitis facilis blanditiis tempore nobis ex quam corporis? Possimus nostrum voluptas adipisci sequi reiciendis, maiores similique eveniet dicta libero.
        </p>
        -->
        </div>
</div>
<style>
    body{
        background: linear-gradient(90deg, rgba(0,62,92,1) 0%, rgba(7,163,213,1) 100%, rgba(0,0,0,1) 100%);
    }
</style>
<!--
    <div class="container d-flex align-items-center justify-content-center">
    <section class="m-5 p-5">
    <h1 class="text-center">IAE SDSI</h1>
    <form action="" method="post" class="d-flex align-items-center justify-content-center flex-column">
    <div class="form-group my-4 col-4">
        <input type="text" name="login" id="login" class="form-control" placeholder="votre login">
    </div>

    <div class="form-group my-4 col-4">
    <input type="password" name="password" id="password" class="form-control" placeholder="votre mot de passe ">
    </div>

    <button class="btn btn-lg btn-info">Se connecter </button>
    </form>
    <p class="my-4 text-center">
    <a href="#">Mot de Passe Oublié ?</a>    
    </p>
    <p class="jumbotron text-center m-2">
        <a href="#" class="nav-item text-info ">Respect de la charte Informatique</a> |
        <a href="#" class="nav-item text-info">Respect de la charte Informatique</a>
        <p>
            Vous avez demandé à accéder à un site sécurisé  de l'Université Jean Moulin qui exige une identification. En vous connectant via ce portail, vous vous enaggez
            à respecter <a href="#" class="text-info">la charte régissant l'usage du système d'information</a> de l'université Jean Moulin Lyon 3.
        </p>
    </p>


    </section>

    </div>
    -->

    <!-- Script javascripts  -->
    
    <!--<script src="{{ asset('C:/wamp64/www/_gestionStage/public/_gs_public/js/bootstrap.min.js') }}" ></script>-->
    <script src="{{ asset('_gs_public/js/script.js') }}" ></script>
    <script src="{{ asset('_gs_public/js/jquery-3.5.1.min.js') }} "></script>
    <script src="{{ asset('_gs_public/js/bootstrap.min.js') }}" ></script>
  
</body>
</html>