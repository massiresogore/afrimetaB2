<?php

class UrlProfile
{

    public function getUrlProfile()
    {
        $profileModele = new ProfileModele;
        if (isset($_SESSION["user"]) && isset($_GET["page"])) {
            if ($_GET['page']  == 'profile') {
                $id = $_GET["id"];

                $user = $profileModele->getUserInfo($id);

                require "views/profile.php";
            }
        }
    }
}
