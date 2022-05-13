<?php


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
            } elseif ($_GET['page']  == 'listesMembres') {
                $users = $modeleRegister->getMembreActif('1');
                require "views/listesMembres.php";
            }
        }
    }
}
