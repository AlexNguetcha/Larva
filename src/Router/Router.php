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
        return $this;
    }

    private function match(string $pathname, string $type):bool
    {
        return is_int($this->createPattern($pathname, $type));
    }

    private function createPattern(string $pathname, string $type)
    {
        $pathname = str_replace("/", "/\\", $pathname);
        $pattern = "^";
        if ($type == "slug") {
            $pattern .= str_replace("[:slug]", "([a-b]-{1,})", $pathname)."$";
            return preg_match($pattern, $this->path, $this->slug);
        }elseif ($type == "id") {
            $pattern .= str_replace("[:id]", "([0-9]{1,})", $pathname)."$";
            echo $pattern;
            return preg_match($pattern, $this->path, $this->id);
        }
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