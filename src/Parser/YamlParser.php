<?php 
namespace App\Parser;

class YamlParser implements Parser{

    public static function parse(string $data):array
    {
        $out = [];
        $lines = explode("\n", $data);
        //print_r($lines);
        for ($i=0; $i < count($lines); $i++) { 
            $config = explode(": ", $lines[$i]);
            $key = $config[0];
            $value = $config[1];
            $out[$key] = $value;
        }
        return $out;
    }

    public static function parseFile($filename):array
    {
        return self::parse(file_get_contents($filename));
    }
}