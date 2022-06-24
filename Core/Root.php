<?php

namespace App\Core;

use App\Controllers\Controller;

/**
 * Routeur principal
 */
class Root
{
    private $handler;
    private const METHOD_POST = "POST";
    private const METHOD_GET = "GET";
    private $notFoundHandler;

    public function get(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }

    public function post(string $path, $handler): void
    {

        $this->addHandler(self::METHOD_POST, $path, $handler);
    }

    public function notFoundHandler($handler)
    {
        $this->notFoundHandler = $handler;
    }

    public function addHandler(string $method, $path, $handler): void
    {
        $this->handler[$method . $path] = [
            "method" => $method,
            "path" => $path,
            "handler" => $handler
        ];
    }

    public function run()
    {
        $uriParse = parse_url($_SERVER['REQUEST_URI']);
        $uriPath = $uriParse["path"];
        $method = $_SERVER["REQUEST_METHOD"];
        var_dump($method);
        $callBack = null;

        if (!$callBack) {
            if (!empty($this->notFoundHandler)) {
                $callBack = $this->notFoundHandler;
            }
        }


        foreach ($this->handler as $handler) {

            if ($method === $handler["method"] && $uriPath === $handler['path']) {
                $callBack = $handler['handler'];
            }
        }


        if (is_string($callBack)) {
            $part = explode("::", $callBack);

            if (is_array($part)) {
                $className = array_shift($part);
                $exc = new $className;
                $method = array_shift($part);
                $callBack = [$exc, $method];
            }
        }

        call_user_func_array($callBack, [array_merge($_GET, $_POST)]);
    }
}