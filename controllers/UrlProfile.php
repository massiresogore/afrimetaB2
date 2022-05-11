<?php

class UrlProfile
{

    public function getUrlProfile()
    {
        if (isset($_GET["page"])) {
            $profileModele = new ProfileModele;

            if ($_GET['page']  == 'profile') {
                if (!isset($_SESSION["user"])) {
                    header("location:index.php");
                    exit;
                } else {
                    if (isset($_GET["id"])) {
                        $id = $_GET["id"];
                        $user = $profileModele->getUserInfo($id);
                        require "views/profile.php";
                    } else {
                        header("location:index.php?page=profile&id=" . $_SESSION["user"]->getId());
                    }
                }
            }
        }
    }
}
