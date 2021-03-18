<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME']);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">


    <title>TP Vélo </title>
</head>

<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASE_URL . "/"; ?>">TP Vélo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                    aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">

                <?php


                if (isset($_SESSION['user'])) { ?>

                    <ul class="navbar-nav mr-auto col-10">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo BASE_URL . "/list-velo"; ?>">
                                Liste des vélos
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo BASE_URL . "/add-velo"; ?>">
                                Ajouter un vélo
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo BASE_URL . "/velo-par-couleur"; ?>">
                                Nombre de Vélo par couleur
                            </a>
                        </li>


                    </ul>
                    <ul class="navbar-nav  mr-auto col-2">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . "/logout"; ?>">
                                Deconnexion
                            </a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav mr-auto col-10">

                    </ul>
                    <ul class="navbar-nav col-2">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . "/"; ?>">
                                Login
                            </a>
                        </li>
                    </ul>
                <?php } ?>

            </div>
        </div>
    </nav>

</header>
<body>
<div class="container principal">
