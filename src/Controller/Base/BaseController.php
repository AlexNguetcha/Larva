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
        $params["schools"] = (new SchoolRepository())->findBy();
        $params["menu"] = $this->menu();
        $routeName = (new Kernel)->getPath();


        //On ne charge pas les annonces dans les
        //pages d'administration
        if (!(is_array(explode("/", $routeName)) && in_array("admin", explode("/", $routeName)))) {
            // ADS
            $adModel = (new AdRepository)->findBy();
            if (count($adModel) > 1) {
                $lucky = random_int(0, count($adModel) - 1);
                $ad = $adModel[$lucky];
                $this->addStat(StatModel::AD);
                $params["ad"] = $ad;
                (new AdRepository)->update($ad->setView(1 + $ad->getView()));
            }
            //ADS
        }

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

    public function menu(): array
    {
        return MenuController::getMenu();
    }

    public function json()
    {
        return Json::getInstance();
    }

    public function addStat(string $type)
    {
        $statModel = new StatModel;
        $statModel->setType($type)
            ->setAt((new DateTime())->format("Y-m-d H:i:s"));
        $statRepo = new StatRepository;
        $statRepo->insert($statModel);
    }
}
