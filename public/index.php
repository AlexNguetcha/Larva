<?php require_once "../vendor/autoload.php";

use App\Kernel\Kernel;
use App\Router\Router;
use App\Components\Request;
use App\Controller\APIController;
use App\Controller\UserController;

$kernel = new Kernel();
$path = $kernel->getPath();
$router = new Router($path);



$router->map("/user", function () {
    //var_dump($test);
    $api = new UserController();
    
    //echo $r->get("name");
    $api->index();
});

$router->build();
