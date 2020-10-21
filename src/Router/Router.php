<?php
namespace App\Router;

use App\Render\Render;

class Router{
    private $matcher = [];
    private $path;
    /**
     * Tableau des differents slug present 
     * dans l'url
     * @var array
     */
    private $slug = [];
    /**
     * Tableau des differents id present 
     * dans l'url
     * @var array
     */
    private $id = [];

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function map(string $path, $function)
    {
        array_push($this->matcher, [$path=>$function]);
        echo $this->createPattern($path);
        return $this;
    }

    private function match(string $pathname):bool
    {
        return is_int($this->createPattern($pathname));
    }

    private function createPattern(string $pathname)
    {
        $pathname = strtolower($pathname);
        $pathname = str_replace("[:slug]", "[0-9a-z-]++", $pathname);
        $pathname = str_replace("[:id]", "[0-9]++", $pathname);
        return $pathname;
    }

    private function createMap()
    {
        //$this->addAutoMap();
        for ($i=0; $i < count($this->matcher); $i++) { 
            $route = $this->matcher[$i];
            //var_dump($route);
            foreach ($route as $pathname => $closure) {            
                if ($this->path === $pathname) {
                    return $closure($this->id, $this->slug);
                }
                /**if ($this->match($pathname, "slug") OR $this->match($pathname, "id")) {
                    return $closure($this->id, $this->slug);
                }*/
            }
        }
        new Render("404.php", ["path"=>$this->path]);
    }

    public function build($automap=true)
    {
        $this->createMap($automap);
    }

}