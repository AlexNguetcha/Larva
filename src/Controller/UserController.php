<?php
namespace App\Controller;

use App\Render\Render;
use App\Repository\UserRepository;
use App\Controller\base\BaseController;


class UserController extends BaseController{

    public function index():Render
    {
        echo($this->json()->encode(["age"=>19]));
        var_dump($this->json()->decode('{"age":19}')["age"]);
        $repo = new UserRepository();
        $users = $repo->findBy();
        return new Render("base.php", [
            "users"=>$users,
            "title"=>"Users List"
            ]
        );
    }


}