<?php 
namespace App\Kernel;

class Kernel{

    public function getPath():string 
    {
        $path = "/";
        if (isset($_SERVER["PATH_INFO"])) {
            $path = $_SERVER["PATH_INFO"];
        }
        return $path;
    }

    public function build()
    {
        
    }
}