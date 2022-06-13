<?php

namespace App\Controllers;

use App\Models\ProfileModel;
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
        $utilisateurs = $utilisateurModel->findAll();

        if ($utilisateurs) {

            // On genere la vue
            $this->render("utilisateur/index", compact('utilisateurs'));
        }
    }

    /**
     * cette methode affiche le profile dun utilisateur
     */
    public function lire(int $id)
    {

        //On instancie le profil model profile
        $profilModel = new ProfileModel;
        $profile = $profilModel->find($id);
        if ($profile) {
            // On genere la vue
            $this->render('utilisateur/profile', compact('profile'));
        }
    }
}