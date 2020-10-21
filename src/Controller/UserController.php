<?php namespace App\Controller;

use App\Render\Render;
use App\Controller\Base\BaseController;


class UserController extends BaseController
{

	public function index():Render
	{
		return new Render("base.php", ["message"=> "Your are welcome !"]);
	}
}
