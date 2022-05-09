<?php
class UrlResetPassword
{

    public function getUrlResetPassword()
    {

        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'resetpassword') {
                if (isset($_POST["resetpassword"]))
                    extract($_POST);
                if (isset($email)) {
                    $ResetPasswordModele = new ResetPasswordModele;
                    $ResetPasswordModele->resetPassword($email);
                }

                require "views/resetpassword.php";
            } elseif ($_GET['page'] == 'newPassword') {


                require "views/newPassword.php";
            }
        }
    }
}
