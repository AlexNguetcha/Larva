<?php require_once "../vendor/autoload.php";

use App\Components\Request;
use App\Router\Router;
use App\Controller\APIController;
use App\Kernel\Kernel;

$kernel = new Kernel();
$path = $kernel->getPath();
$router = new Router($path);



$router->map("/user", function () {
    $api = new APIController();
    $r = new Request();
    echo $r->get("name");
    $api->index();
})
    ->map("/user/[:id]", function () {
        $api = new APIController();
        $api->cards();
    })
    ->map("/api/cards", function () {
        $api = new APIController();
        $api->cards();
    });

$router->build();
