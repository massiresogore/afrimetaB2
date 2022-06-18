<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UtilisateurModel;

class UsersController extends Controller
{
    public function connexion()
    {
        // on verifi si le formulaire est complet
        if (Form::validate($_POST, ['email', 'password'])) {
            //le formulaire est complet

            $user = new UtilisateurModel;
            $userArray = $user->findOneByEmail(strip_tags($_POST['email']));


            // utilisateur nexite pas
            if (!$userArray) {
                $_SESSION['error'] = "adresse email et ou mot de passe incorrrect";
                //header('location:users/connexion');
            }

            // utilisateur nexit
            $uti = $user->hydrater($userArray);

            //on verifi si le mot de pass est correct
            if (password_verify($_POST['password'], $user->getPassword())) {
                $user->setSession();
            } else {
                $_SESSION['error'] = "adresse email et ou mot de passe incorrrect";
            }
            var_dump($_SESSION['user']);
        }

        $this->render('users/connexion');
    }
    public function inscription()
    {

        $form = new Form;
        if ($form::validate($_POST, ['email', 'password'])) {
            // le formulaire est valide
            //On netoi email
            $email = strip_tags($_POST['email']);
            $nom = strip_tags($_POST['nom']);

            // on chiffre le mot de pass
            $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $user = new UtilisateurModel;
            $user->setNom($nom)
                ->setEmail($email)
                ->setActive(1)
                ->setPassword($pass)
                ->setToken("valide");
            $user->create();

            echo 'valide';
        } else {
            // le formulaire nest pas  valide
            echo 'no valide';
        }

        //var_dump($_POST);
        $this->render('users/inscription');
    }
}