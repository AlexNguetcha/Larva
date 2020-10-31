<?php

namespace App\Controller\Base;


use DateTime;
use App\Render\Render;
use App\Map\FormMapper;
use App\Components\Json;
use App\Model\StatModel;
use App\Components\Request;
use App\Model\Base\BaseModel;
use App\Repository\AdRepository;
use App\Controller\MenuController;
use App\Kernel\Kernel;
use App\Repository\StatRepository;
use App\Repository\SchoolRepository;

class BaseController implements Controller
{

    public function render(string $filename, $params = [])
    {
        return new Render($filename, $params);
    }

    public function request()
    {
        return new Request();
    }

    public function mapForm(Request $request, BaseModel $model): BaseModel
    {
        $formMapper = new FormMapper();
        return $formMapper->map($request, $model);
    }

    public function json()
    {
        return Json::getInstance();
    }

}
