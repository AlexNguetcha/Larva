<?php 

;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Larva</title>
</head>
<body>
<style>
    body{
        background-color: #f5f5f5;
    }
    .alert{
        width: max-content;
        padding: 1%;
        border-radius: 2%;
        background-color: #D4EDDA;
        text-align: center;
        color: #155724;
        font-size: sans-serif;
        margin: auto;
        transform: translate(0, 50%);
    }
</style>
<div class="container">
    <div class="alert alert-info" role="alert">
         <h2 class="alert-heading"><?= $message ;?></h2>
         <p>Nice job ! your are ready to code.</p>
         <p class="mb-0"><a href="http://github.com/alexnguetcha/larva.git">http://github.com/alexnguetcha/larva.git</a></p>
    </div>
</div>
</body>
</html>