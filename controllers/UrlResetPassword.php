<?php
class UrlResetPassword
{

    public function getUrlResetPassword()
    {

        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'resetpassword') {
                require "views/resetpassword.php";
            }
        }
    }
}
