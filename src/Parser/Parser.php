<?php 
namespace App\Parser;

interface Parser{
    static function parse(string $data):array;
    static function parseFile(string $filename):array;
}