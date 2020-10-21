<?php 
namespace App\Render;
use App\Components\Loader;

class Render{
    private $filename;
    private $params;

    private $root;

    public function __construct(string $filename, array $params=[], $root="../templates/")
    {
        /**
         * Le nom des cles dans le tableau $params
         * pourront etre utilise directement comme nom de variable
         * exemple: si $params = ["users"=>...]
         * alors $users sera crée contenant la valeur
         * présente dans le tableau
         */
        $loader = new Loader;
        foreach ($params as $key => $value) {
        }
        require_once $root.$filename;
    }

    public function tmp()
    {
        
    }

    private function setPath(string $path)
    {
        $this->path = $path;
    }


}