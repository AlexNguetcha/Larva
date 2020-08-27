<?php
namespace App\Router;


class Router{
    private $matcher = [];
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function map(string $path, $function)
    {
        array_push($this->matcher, [$path=>$function]);
        return $this;
    }
    
    private function addAutoMap()
    {
        //comming soon!
        $file = fopen("../src/Map/map.yaml", "r");
        while(!feof($file)){
            // /api : APIController::index
            $line = str_replace("\n", "", fgets($file));
            $route = explode(" : ", $line);
            $path = $route[0];
            $closure = explode("::", $route[1]);
            $className = $closure[0];
            $methodName = $closure[1];
            $this->map($path, ["App\Controller\\".$className, $methodName]);
        }
        var_dump($this->matcher);

    }

    private function createMap()
    {
        //$this->addAutoMap();
        for ($i=0; $i < count($this->matcher); $i++) { 
            $route = $this->matcher[$i];
            //var_dump($route);
            foreach ($route as $pathname => $closure) {            
                if ($this->path === $pathname) {
                    return $closure();
                }
            }
        }
        require_once "../templates/404.php";;
    }

    public function build($automap=true)
    {
        $this->createMap($automap);
    }

}