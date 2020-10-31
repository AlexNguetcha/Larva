<?php 
namespace App\Render;
use App\Components\Loader;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
class Render{
    private $filename;
    private $params;

    private $root;

    public function __construct(string $filename, array $params=[], $root="../templates/")
    {
        /**
         * The keys name in table $params
         * must directly be use as variable name
         * example: if $params = ["users"=>...]
         * then $users will be create and contains value 
         * of $params["users"].
         */
        $loader = new Loader;
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        require_once $root.$filename;
    }

    private function setPath(string $path)
    {
        $this->path = $path;
    }


}