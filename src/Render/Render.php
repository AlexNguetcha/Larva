<?php 
namespace App\Render;

class Render{
    private $filename;
    private $params;

    public function __construct(string $filename, array $params=null)
    {
        $params = $params;
        require_once "../templates/".$filename;
    }


}