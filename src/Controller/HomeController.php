<?php 
namespace App\Controller;

use App\Render\Render;
use App\Controller\Base\BaseController;

class HomeController extends BaseController{

    public function index():Render
    {
        return new Render("home.php", ["message"=> "Your are welcome !"]);
    }

}