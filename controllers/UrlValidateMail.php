<?php

namespace App\controllers;

use App\modeles\ValidateMailModele;

class UrlValidateMail
{

    public function getUrlValidateMail()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'validation') {

                if (isset($_GET['email']) && isset($_GET['token'])) {
                    $email = $_GET['email'];
                    $token = $_GET['token'];
                    $ValidateMailModele = new ValidateMailModele;
                    $ValidateMailModele->getValidateMail($email, $token);
                }
            }
        }
    }
}
