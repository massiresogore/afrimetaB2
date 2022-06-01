<?php

namespace App\controllers;

use App\modeles\ConnexionModele;

class UrlConnexion
{


    public function getUrlConnexion()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'connexion') {
                if (isset($_POST["connexion"])) {
                    $ConnexionModele = new ConnexionModele;
                    $ConnexionModele->setConnexion($_POST);
                }
                require "views/connexion.php";
            } elseif ($_GET['page']  == 'deconnexion') {
                if ($_SESSION["user"]) {

                    session_unset();
                    session_destroy();
                    header('location:.');
                    exit;
                } else {
                    header('location:.');
                    exit;
                }
            }
        }
    }
}
