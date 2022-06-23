<?php
// On definit une constante contenant le dossier racine du projet

use App\Autoloader;
use App\Controllers\MainController;
use App\Core\Root;
use App\Models\ProfileModel;

define('ROOT', dirname(__DIR__));

// on importe l autoloader
require_once ROOT . "/Autoloader.php";
Autoloader::register();

// on instancie Main (Notre Routeur)
$app = new Root();

// Page dAccueil
$app->get('/',  MainController::class . '::homePage');

//Page Non Trouvée
$app->notFoundHandler(MainController::class . '::notFoundHandler');

//Page inscription
$app->get('/inscription', function (array $param = []) {
    $controller = new MainController;

    $controller->render('users/inscription', compact('param'));
});

//Liste des membres
$app->get('/listeDesMembres', MainController::class . '::listeDesMembres');

//publications
$app->get('/publication', MainController::class . '::publication');

//Profile
$app->get('/profile', function (array $param = []) {
    $controller = new MainController;
    $profileModel = new ProfileModel;
    $profile = $profileModel->findBy($param);
    $controller->render('membres/profile', compact('param', 'profile'));
});

// on demarre lapplication
$app->run();