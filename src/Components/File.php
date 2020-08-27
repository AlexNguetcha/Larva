<?php 
namespace App\Components;

class File{

    public function get($key, $default=null): ?string
    {
        return isset($_FILES[$key]) ? $_FILES[$key]:$default;
    }
    
}
