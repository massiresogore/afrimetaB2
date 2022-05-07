<?php


class UrlConnexion
{

    public function getUrlConnexion()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'connexion') {
                require "views/connexion.php";
            }
        }
    }
}
