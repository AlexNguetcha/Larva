<?php 

namespace App\Controller\base;

use App\Render\Render;


class BaseController implements Controller{

    public function render(string $filename, $params)
    {
        return new Render("../../../view/".$filename, $params);
    }

    public final function setMap(string $path)
    {
        if (!$this->isMapped($path)) {
            $this->addMapRoute($path);
        }
    }

    private final function isMapped($path)
    {
        $file = fopen("../../Map/map.yaml", "a+");
        while(!feof($file)){
            $line = fgets($file);
            if (strpos("$path : ", $line) !== false ) {
                return true;
            }
        }
        fclose($file);
        return false;
    }

    private function addMapRoute(string $path, $methodName)
    {
        $file = fopen("../../Map/map.yaml", "a+");
        fwrite($file, "$path : ".__CLASS__."::".$methodName."\n");
        fclose($file);
    }
    
}