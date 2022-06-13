<?php

namespace App\Controllers;

abstract class Controller
{

    public function render(String $fichier, array $donnees = [])
    {
        // On extrait le contenu des donnees
        extract($donnees);

        require_once ROOT . '/Views/' . $fichier . '.php';
    }
}