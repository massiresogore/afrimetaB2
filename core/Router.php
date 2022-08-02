<?php

namespace App\core;

class Router
{
    public array $routes = [];
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callBack)
    {
        $this->routes["get"][$path] = $callBack;
    }

    public function resolve()
    {
        $method = $this->request->method();
        $path = $this->request->getPath();
        $callBack = $this->routes[$method][$path] ?? false;

        if ($callBack == false) {
            return "Not Found";
        }

        return call_user_func($callBack);
    }
}