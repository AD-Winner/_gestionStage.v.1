<?php
require_once '../../controller/Routes.php';    
?>
<!DOCTYPE html>
<html lang="fr">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Stage</title>
    <!-- Styles css -->
    <link rel="shortcut icon" href="../../public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../public/css/bootstrap.min-1.css"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<?php include_once '../layouts/header.php'  ?>

    <div class="container">
        <h1>Nous Contacter</h1>
        <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, voluptate ratione facilis rerum minima iste consectetur, nostrum nulla perferendis voluptas pariatur eligendi beatae recusandae accusamus, dicta enim. Dicta, corporis rerum.
        </p>
        <form action="#" method="get" class="col-6 mx-auto">
            <div class="form-group mt-4">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control">
            </div>
            <div class="form-group mt-4">
            <label for="nom">Nom</label>
                <input type="text" name="prenom" id="prenom" class="form-control">
            </div>
            <div class="form-group mt-4">
            <label for="Email">Adresse electronique</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group d-flex mt-4">
            <label for="message">Votre message : </label>
            <textarea name="message" id="message" cols="80" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>


    <?php include_once '../layouts/Footer.php'  ?>

    <!-- Script javascripts  -->
    <script src="../../public/js/script.js"></script>
    <script src="../../public/js/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
</body>
</html>