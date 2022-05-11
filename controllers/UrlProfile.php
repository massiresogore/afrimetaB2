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
                        $id_user = $_GET["id"];
                        $user = $profileModele->getUserCon($id_user);

                        if (isset($_POST["enregistrer"])) {
                            $profileModele->updateProfile($_POST, $id_user);
                        }


                        require "views/profile.php";
                    } else {
                        header("location:index.php?page=profile&id=" . $_SESSION["user"]->getId());
                    }
                }
            }
        }
    }
}
