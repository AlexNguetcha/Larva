<?php 
namespace App\Controller\Base;

interface Controller{
    function render(string $filename, $params);
    function setMap(string $path);
}