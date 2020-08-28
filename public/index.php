<?php require_once "../vendor/autoload.php";

use App\Kernel\Kernel;
use App\Router\Router;
use App\Controller\HomeController;
use App\Controller\UserController;


$kernel = new Kernel();
$path = $kernel->getPath();
$router = new Router($path);


$router->map("/", function () {
    $api = new HomeController();
    $api->index();
    })
    ->map("/user", function () {
        $api = new UserController();
        $api->index();
    })

->build();
