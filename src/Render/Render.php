<?php 
namespace App\Render;

class Render{
    private $filename;
    private $params;

    public function __construct(string $filename, array $params=null)
    {
        /**
         * Le nom des cles dans le tableau $params
         * pourront etre utilise directement comme nom de variable
         * exemple: si $params = ["users"=>...]
         * alors $users sera crée contenant la valeur
         * présente dans le tableau
         */
        foreach ($params as $key => $value) {
            $tmp = $key;
            $$tmp = $value;
        }
        require_once "../templates/".$filename;
    }


}