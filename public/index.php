<?php

use App\Autoloader;
use App\controllers\EditController;
use App\controllers\ListUsersController;
use App\controllers\LoginController;
use App\controllers\MainController;
use App\controllers\ProfileController;
use App\controllers\RegisterController;
use App\core\Application;


define("ROOT_DIR", dirname(__DIR__));

require_once ROOT_DIR . "/Autoloader.php";

Autoloader::register();



$app = new Application(ROOT_DIR);

$app->router->get("/", [MainController::class,  "main"]);

$app->router->get("/register", [RegisterController::class, "register"]);
$app->router->post("/register", [RegisterController::class, "register"]);

$app->router->get("/login", [LoginController::class, "login"]);
$app->router->post("/login", [LoginController::class, "login"]);

$app->router->get("/profile", [ProfileController::class, "profile"]);
$app->router->post("/profile", [ProfileController::class, "profile"]);

$app->router->get("/editProfile", [EditController::class, "edit"]);
$app->router->post("/editProfile", [EditController::class, "edit"]);

$app->router->get("/ListUsers", [ListUsersController::class, "ListUsers"]);

$app->run();