<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;

class UtilisateurController extends Controller
{
    /**
     * cette methode affichera la liste des utilisateurs
     */
    public function index()
    {
        // On instancie le model correspondant à la table
        $utilisateurModel = new UtilisateurModel;

        // On va chercher les utilisateur
        $utilisateur = $utilisateurModel->findAll();

        var_dump($utilisateur);
    }
}