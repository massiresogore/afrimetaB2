<?php


class UrlRegister
{

    public function getUrlRegister()
    {

        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'register') {

                $dataRegistred = $_POST;
                if (isset($_POST["register"])) {
                    $modeleRegister = new RegisterModele;
                    $modeleRegister->Register($dataRegistred);
                }
                require "views/register.php";
            }
        }
    }
}
