<?php

namespace App\core;

use App\Models\View;

class Application
{
    public static $rootDir;
    public Router $router;
    public Request $request;
    public static $app;
    public View $view;

    public function __construct($rootDir)
    {
        self::$rootDir = $rootDir;
        self::$app = $this;
        $this->request = new Request;
        $this->view = new View;
        $this->router = new Router($this->request,  $this->view);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}