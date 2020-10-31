<?php 
namespace App\Components;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
class Post{

    public function get($key, $default=null): ?string
    {
        return isset($_POST[$key]) ? $_POST[$key]:$default;
    }
    
}
