<?php 
namespace App\Components;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
class Loader{

    static function loadCSS($filename):string
    {
        $href = "../assets/css/".$filename;
        return '<link rel="stylesheet" type="text/css" href="'.$href.'">';

    }

    static function loadJS($filename):string
    {
        $src = "../assets/js/".$filename;
        return '<script type="text/javascript" src="'.$src.'"></script>';
    }
}