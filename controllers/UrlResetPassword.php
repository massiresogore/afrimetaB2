<?php

namespace App\controllers;

use App\modeles\ResetPasswordModele;

class UrlResetPassword
{

    public function getUrlResetPassword()
    {
        $ResetPasswordModele = new ResetPasswordModele;

        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'resetpassword') {
                if (isset($_POST["resetpassword"]))
                    extract($_POST);
                if (isset($email)) {
                    $ResetPasswordModele->resetPassword($email);
                }

                require "views/resetpassword.php";
            } elseif ($_GET['page'] == 'newPassword') {
                $email = $_GET["email"];
                $token = $_GET["token"];
                if (isset($_POST["enregistrer"])) {
                    $ResetPasswordModele->saveNewPassword($_POST, $email, $token);
                }
                require "views/newPassword.php";
            }
        }
    }
}
