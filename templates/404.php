<?php
http_response_code(404);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <title>Page Not Found</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col col-md">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-3">Page not found</h1>
                        <p class="lead"><?= $path ?></p>
                        <hr class="my-2">
                        <p>The request page may be delete,please contact administrator.</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="/user" role="button">Go to home</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://localhost/vendor/components/jquery/jquery.js"></script>
    <script src="http://localhost/vendor/rsportella/popper/packages/popper/src/index.js"></script>
    <script src="http://localhost/vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>