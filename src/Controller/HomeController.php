<<<<<<< HEAD
<?php 
namespace App\Controller;

use App\Render\Render;
use App\Controller\Base\BaseController;
=======
<?php
namespace App\Controller;

use App\Render\Render;
use App\Repository\UserRepository;
use App\Controller\base\BaseController;

>>>>>>> e47bff1c771799cb06b76ded159052e3ff1cd8e0

class HomeController extends BaseController{

    public function index():Render
    {
<<<<<<< HEAD
        return new Render("home.php", ["message"=> "Your are welcome !"]);
    }
=======
        return new Render("base.php", ["text"=>"<strong>Good job!</strong> You should begin now."]);
    }
    

>>>>>>> e47bff1c771799cb06b76ded159052e3ff1cd8e0

}