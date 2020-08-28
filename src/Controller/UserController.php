<?php
namespace App\Controller;

use App\Render\Render;
use App\Repository\UserRepository;
use App\Controller\base\BaseController;


class UserController extends BaseController{

    public function index():Render
    {
        $repo = new UserRepository();
        $users = $repo->findBy();
        return new Render("base.php", ["users"=>$users]);
    }

    public function cards():Render
    {
        return new Render("base.php", ["name"=>"alex"]);
    }

}