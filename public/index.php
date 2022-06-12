<?php
// On definit une constante contenant le dossier racine du projet

use App\Autoloader;
use App\Core\Main;

define('ROOT', dirname(__DIR__));

// on importe l autoloader
require_once ROOT . "/Autoloader.php";
Autoloader::register();

// on instancie Main (Notre Routeur)
$app = new Main();

// on demarre l application
$app->start();