<?php

namespace App\core;

class Request
{
    public function method()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getPath()
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($path, "?");

        if ($position) {
            $path = substr($path, 0, $position);
        }

        return $path;
    }
}