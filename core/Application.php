<?php

namespace App\core;

class Application
{
    public static $rootDir;
    public Router $router;
    public Request $request;
    public static $app;

    public function __construct($rootDir)
    {
        self::$rootDir = $rootDir;
        self::$app = $this;
        $this->request = new Request;
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}