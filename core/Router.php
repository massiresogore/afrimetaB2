<?php

namespace App\core;

use App\Models\View;

class Router
{
    public array $routes = [];
    public Request $request;
    public View $view;

    public function __construct(Request $request, View $view)
    {
        $this->request = $request;
        $this->view = $view;
    }

    public function get($path, $callBack)
    {
        $this->routes["get"][$path] = $callBack;
    }

    public function post($path, $callBack)
    {
        $this->routes["post"][$path] = $callBack;
    }

    public function resolve()
    {
        $method = $this->request->method();
        $path = $this->request->getPath();
        $callBack = $this->routes[$method][$path] ?? false;

        if ($callBack === false) {
            return Application::$app->notFound->notFound();
        }

        if (is_string($callBack)) {
            return Application::$app->view->render($callBack);
        }

        if (!is_string($callBack)) {
            $callBack[0] = new $callBack[0];
        }

        return call_user_func($callBack, $this->request, $this->view);
    }
}