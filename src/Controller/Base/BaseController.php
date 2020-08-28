<?php 

namespace App\Controller\Base;

use App\Components\Json;
use App\Render\Render;
use App\Components\Request;


class BaseController implements Controller{
    

    public function render(string $filename, $params)
    {
        return new Render("../../../view/".$filename, $params);
    }

    public function request()
    {
        return new Request();
    }
    
    function json()
    {
        return Json::getInstance();
    }
    
}