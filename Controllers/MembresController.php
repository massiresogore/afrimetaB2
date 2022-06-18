<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\UtilisateurModel;

class MembresController extends Controller
{

    /**
     * cette methode affichera la liste des utilisateurs
     */
    public function index()
    {
        // On instancie le model correspondant à la table
        $UtilisateurModel = new UtilisateurModel;
        // On va chercher les utilisateur
        $utilisateurs = $UtilisateurModel->findAll();

        if ($utilisateurs) {
            // On genere la vue
            $this->render("membres/index", compact('utilisateurs'));
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


        $this->render('membres/profile', compact('profile'));
    }
}