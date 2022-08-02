<?php

use App\Autoloader;
use App\core\Application;


define("ROOT_DIR", dirname(__DIR__));

require_once ROOT_DIR . "/Autoloader.php";

Autoloader::register();



$app = new Application(ROOT_DIR);

$app->router->get("/", fn () => "Home Page");
$app->router->get("/contact", fn () => "Contact Page");

$app->run();