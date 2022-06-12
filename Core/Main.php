<?php

namespace App\Core;

use App\Controllers\MainController;

/**
 * Routeur principal
 */
class Main
{
    public function start()
    {
        //http://localhost/afrimeta/public/controller/method/parametre 
        // exemple: http://localhost/afrimeta/public/utilisateur/index/$id
        /**
         * utilisateur = Controller
         * index = method du controller Utilisateur
         * $id = parametre du methode index
         */

        // en relalite cest : http://localhost/afrimeta/public/index.php?p=utilisateur/index/$id
        // Etape 1 : On retire le trailling slash ( / ) de lURL 
        // On recupere lURL pour retirer le /

        $uri = $_SERVER["REQUEST_URI"];



        if (!empty($uri) && $uri != "/"   && $uri[-1] === "/") {
            $uri = substr($uri, 0, -1);
            // On envoie un code de redirection permanent
            http_response_code(301);
        }




        // On separe les parametre dans un tableau 
        //p=controller/method/parametre
        $params = [];
        if (isset($_GET["p"])) {
            $params = explode("/", $_GET["p"]);
        }




        if (!empty($params[0])) {
            // On a au moins 1 paramètre
            // On récupère le nom du contrôleur à instancier
            // On met une majuscule en 1ère lettre, on ajoute le namespace complet avant et on ajoute "Controller" après
            $controller = '\\App\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';
            $controller = new $controller();

            $action = (isset($params[0]) ?  array_shift($params) : 'index');

            if (method_exists($controller, $action)) {
                (isset($params[0])) ? $controller->$action($params) : $controller->$action();
            } else {
                http_response_code(404);
                echo "page rechercer nexiste pas";
            }
        } else {
            // On instancie le main controller
            $main = new MainController;
            $main->index();
        }
    }
}