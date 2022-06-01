<?php

namespace App\controllers;

use App\modeles\ProfileModele;
use App\modeles\RegisterModele;

class UrlRegister
{

    public function getUrlRegister()
    {
        $modeleRegister = new RegisterModele;
        $profileModele = new ProfileModele;

        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'register') {
                $modeleRegister->Register($_POST);
                require "views/register.php";
                $_SESSION["mailSent"] = "";
                unset($_SESSION['mailSent']);
                $_SESSION['notification'] = [];
            } elseif ($_GET['page']  == 'listesMembres') {
                $users = $modeleRegister->getMembreActif('1');
                require "views/listesMembres.php";
            }
        }
    }
}
