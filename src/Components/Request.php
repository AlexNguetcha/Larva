<?php

namespace App\Components;

class Request
{
    public $post;
    public $files;

    public function __construct()
    {
        $this->post = new Post;
        $this->files = new File;
    }

    public function get($key, $default = null): ?string
    {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public function request($key, $default="GET"): ?string
    {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    public function getMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

}
