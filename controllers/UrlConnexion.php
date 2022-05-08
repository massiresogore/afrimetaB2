<?php


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
            }
        }
    }
}
