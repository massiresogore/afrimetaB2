<?php

namespace App\Controllers;

abstract class Controller
{

    public function render(String $fichier, array $donnees = [])
    {
        // On extrait le contenu des donnees
        extract($donnees);

        // On demarre le buffer de sortie
        ob_start();

        require_once ROOT . '/Views/' . $fichier . '.php';

        // transfert le buffer dans contenu
        $contenu = ob_get_clean();

        require_once ROOT . '/Views/default.php';
    }
}