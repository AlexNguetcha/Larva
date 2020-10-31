<?php 
namespace App\Components;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
class Json{
    private static $instance = 0;
    private static $json;

    private function __construct()
    {

    }

    static function getInstance():Json
    {
        if (self::$instance === 0) {
            self::$json = new Json();
        }
        return self::$json;
    }

    public function decode(string $data):array
    {
        return json_decode($data, true);
    }

    public function encode($data):string
    {
        return json_encode($data);
    }
}