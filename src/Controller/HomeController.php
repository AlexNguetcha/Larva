<?php 
namespace App\Controller;

use App\Render\Render;
use App\Components\Alpha;
use App\Controller\Base\BaseController;

class HomeController extends BaseController{

    public function index():Render
    {
        $alpha = new Alpha();
        $alpha->setRootPath("web/")
        ->setMaxFileSize(2*1024*1024)
        ->addFileExtension("png", "gif")
        ->addFileMimeType("image/png", "image/gif");
       
        return $this->render("home.php", ["message"=> "Welcome to Larva !"]);
    }

}