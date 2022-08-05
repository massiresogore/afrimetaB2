<?php

use App\Autoloader;
use App\controllers\EditController;
use App\controllers\ListUsersController;
use App\controllers\LoginController;
use App\controllers\MainController;
use App\controllers\NewPasswordController;
use App\controllers\ProfileController;
use App\controllers\RegisterController;
use App\controllers\resetPasswordController;
use App\core\Application;

define("ROOT_DIR", dirname(__DIR__));

require_once ROOT_DIR . "/Autoloader.php";

Autoloader::register();

$app = new Application(ROOT_DIR);

/************** main ************/
$app->router->get("/", [MainController::class,  "main"]);

/************** register ************/
$app->router->get("/register", [RegisterController::class, "register"]);
$app->router->post("/register", [RegisterController::class, "register"]);


/************** login ************/
$app->router->get("/login", [LoginController::class, "login"]);
$app->router->post("/login", [LoginController::class, "login"]);

/************** profile ************/
$app->router->get("/profile", [ProfileController::class, "profile"]);
$app->router->post("/profile", [ProfileController::class, "profile"]);

/************** editProfile ************/
$app->router->get("/editProfile", [EditController::class, "edit"]);
$app->router->post("/editProfile", [EditController::class, "edit"]);

/************** ListUsers ************/
$app->router->get("/ListUsers", [ListUsersController::class, "ListUsers"]);

/************** Reset Password ************/
$app->router->get("/resetPassword", [resetPasswordController::class, "resetPassword"]);
$app->router->post("/resetPassword", [resetPasswordController::class, "resetPassword"]);

/************** newPassword ************/
$app->router->get("/newPassword", [NewPasswordController::class, "newPassword"]);
$app->router->post("/newPassword", [NewPasswordController::class, "newPassword"]);

$app->run();