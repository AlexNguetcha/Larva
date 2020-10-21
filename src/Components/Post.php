<?php 
namespace App\Components;

class Post{

    public function get($key, $default=null): ?string
    {
        return isset($_POST[$key]) ? $_POST[$key]:$default;
    }
    
}
