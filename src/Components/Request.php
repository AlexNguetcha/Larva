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

}
