<?php 
namespace App\Controller;

use App\Render\Render;
use App\Components\Alpha;
use App\Controller\Base\BaseController;

class HomeController extends BaseController{

    public function index():Render
    {       
        return $this->render("home.php", ["message"=> "Welcome to Larva !"]);
    }

}