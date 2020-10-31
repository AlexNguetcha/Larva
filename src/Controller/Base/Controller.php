<?php 
namespace App\Controller\Base;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
interface Controller{
    function render(string $filename, $params=[]);
    function request();
    function json();
}