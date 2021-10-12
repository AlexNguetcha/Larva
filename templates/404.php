<?php 

;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Larva</title>
</head>
<body>
<style>
    body{
        background-color: #f5f5f5;
    }
    .alert{
        width: max-content;
        padding: 1%;
        border-radius: 4px;
        background-color: #f5f5f5;
        text-align: center;
        color: #155724;
        font-size: 20px;
        margin: auto;
        transform: translate(0, 50%);
        font-family: Arial, Helvetica, sans-serif;
        box-shadow: 0px 1px 3px #333333;
    }
    .alert a{
        text-decoration: none;
        color: #2ab;
    }
</style>
<div class="container">
    <div class="alert">
         <h2 class="alert-heading">Page not found !</h2>
         <p>the route <b><?= $route ;?> </b>not work, you should verify your routes on index.php</p>
         <p class="mb-0"><a href="https://github.com/alexnguetcha/Larva">Contribute to the Larva Project here now</a></p>
    </div>
</div>
</body>
</html>