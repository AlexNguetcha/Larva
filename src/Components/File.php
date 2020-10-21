<?php 
namespace App\Components;

class File{

    public function get($key, $default=null): ?array
    {
        return isset($_FILES[$key]) ? $_FILES[$key]:$default;
    }
    
}
