<?php 
namespace App\Components;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
class File{

    public function get($key, $default=null): ?array
    {
        return isset($_FILES[$key]) ? $_FILES[$key]:$default;
    }
    
}
