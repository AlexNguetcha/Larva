<!doctype html>
<html lang="en">

<head>
    <title>404 page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--   $loader::loadCSS("index.css")   -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="asset/images/favicon.ico" type="image/x-icon">
</head>

<body>
<?php

use App\Kernel\Kernel;

require_once "../templates/pages/navbar.php" ?>
    <div class="container mt-4">
        <div class="row mt-4"></div>
        <div class="row mt-4"></div>
        <div class="row mt-4"></div>
        <div class="row mt-4">
            <div class="col col-md mt-4">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-3"><i class="fa fa-ambulance" aria-hidden="true"></i> Page non disponible</h1>
                        <p class="lead"><?= $route ?></p>
                        <hr class="my-2">
                        <p>La page <strong class="alert-danger"><?=(new Kernel)->getPath() ;?></strong> demandée n'a pas été trouvée ou est temporairement indisponible.</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="/" role="button"><i class="fa fa-backward" aria-hidden="true"></i> Retourner à l'accueil</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4"></div>
        <div class="row mt-4"></div>
        <div class="row mt-4"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php require_once "../templates/pages/footer.php" ?>
</body>

</html>