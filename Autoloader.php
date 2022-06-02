<?php

namespace App;

class Autoloader
{

    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            "autoload"
        ]);
    }

    static function autoload($class)
    {
        //on recupère le name spance dans le quel il se trouve 
        //on retire le namespace => App par un vide
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);

        // on remplace \ par /
        $class = str_replace('\\', '/', $class);


        // on require le repertoire courant de la classe concerne
        require_once __DIR__ . '/' . $class . '.php';
        //echo __DIR__ . '/' . $class . '.php';
    }
}