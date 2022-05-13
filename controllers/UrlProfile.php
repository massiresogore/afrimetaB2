<?php

class UrlProfile
{

    public function getUrlProfile()
    {
        if (isset($_GET["page"])) {
            $profileModele = new ProfileModele;

            if ($_GET['page']  == 'modifierprofile') {

                if (!isset($_SESSION["user"])) {
                    header("location:index.php");
                    exit;
                } else {

                    if (isset($_GET["id"])) {
                        if ($_GET["id"] == $_SESSION["user"]->getId()) {
                            $id_user = $_GET["id"];
                            $user = $profileModele->getUserCon($id_user);
                            $profile = $profileModele->getProfileUser($id_user);
                            if (isset($_POST)) {


                                if ($profile->getId()) {
                                    //on met ajour si id profile existe
                                    $profileModele->updateProfile($_POST, $id_user);
                                } else {
                                    //on insert si id profile n'existe pas
                                    $profileModele->addProfile($_POST, $id_user);
                                }
                            }
                            require "views/modifierprofile.php";
                        } else {
                            header("location:index.php?page=modifierprofile&id=" . $_SESSION["user"]->getId());
                        }
                    } else {
                        header("location:index.php?page=modifierprofile&id=" . $_SESSION["user"]->getId());
                    }
                }
            }
        }
    }
}
