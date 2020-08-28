<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?= $loader::loadCSS("index.css")  ?>
    <link rel="stylesheet" type="text/css" href="http://localhost/vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>

<body>
    <div class="contain">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <?= $text ?>
        </div>
    </div>

    <!-- $loader::loadJS("index.js") -->
    
    <script src="http://localhost/vendor/components/jquery/jquery.js"></script>
    <script src="http://localhost/vendor/rsportella/popper/packages/popper/src/index.js"></script>
    <script src="http://localhost/vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>