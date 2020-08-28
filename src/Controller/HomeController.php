<?php
namespace App\Controller;

use App\Render\Render;
use App\Repository\UserRepository;
use App\Controller\base\BaseController;


class HomeController extends BaseController{

    public function index():Render
    {
        return new Render("base.php", ["text"=>"<strong>Good job!</strong> You should begin now."]);
    }
    


}