<?php


class UrlRegister
{

    public function getUrlRegister()
    {
        $modeleRegister = new RegisterModele;


        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'register') {
                $modeleRegister->Register($_POST);
                require "views/register.php";
            }
        }
    }
}
