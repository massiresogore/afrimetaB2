<?php

namespace App;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([
            __CLASS__,
            "autoload"
        ]);
    }

    public static function autoload($class)
    {
        // on retire le namespace et meme temps on remplace \ par /
        $class = str_replace(array(__NAMESPACE__ . "\\", "\\"), "/", $class);

        $class = __DIR__ . $class . ".php";

        if (file_exists($class)) {
            return require_once $class;
        }
    }
}