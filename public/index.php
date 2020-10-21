<?php session_start();
require_once "../vendor/autoload.php";

use App\Kernel\Kernel;
use App\Render\Render;
use App\Model\StatModel;
use App\Router\AltoRouter;
use App\Components\Request;
use App\Controller\AdController;
use App\Controller\HomeController;
use App\Repository\StatRepository;
use App\Controller\AdminController;
use App\Controller\SchoolController;
use App\Controller\ArticleController;
use App\Controller\SubjectController;

$kernel = new Kernel();

$tables = [
  //"CREATE TABLE IF NOT EXISTS `user` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;",
];
//$kernel->createTables($tables);

$path = $kernel->getPath();

$router = new AltoRouter();

// map homepage
$router->map('GET', '/', function () {
  return (new HomeController())->index();
}, 'home');


$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
  $routeName =  $match["name"];
  if (is_array(explode(".", $routeName)) && explode(".", $routeName)[0] === "admin") {
    // check if user is authenticated
    if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
      //it is ok
      return call_user_func_array($match['target'], $match['params']);
    } else {
      //redirect to login form
      $_SESSION["HTTP_REFERER"] = $path;
      header("Location:/login");
    }
  } else{
    return call_user_func_array($match['target'], $match['params']);
  }
} else {
  $home = new HomeController;
  return $home->render("404.php", ["route" => $match['name']]);
}
