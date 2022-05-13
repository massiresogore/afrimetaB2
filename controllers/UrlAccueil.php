<?php


class UrlAccueil
{

    public function getUrlAccueil()
    {

        if (empty($_GET['page'])) {
            require "views/accueil.php";

            if (isset($_GET['page'])) {
                if ($_GET['page']  == 'accueil') {
                    require "views/accueil.php";
                }
            }
        }
    }
}
