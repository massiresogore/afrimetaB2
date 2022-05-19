<?php

class UrlProfile
{

    public function getUrlProfile()
    {
        if (isset($_GET["page"])) {
            $profileModele = new ProfileModele;

            if ($_GET['page']  == 'modifierProfile') {

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

                            require "views/modifierProfile.php";
                        } else {
                            header("location:index.php?page=modifierProfile&id=" . $_SESSION["user"]->getId());
                            exit;
                        }
                    } else {
                        header("location:index.php?page=modifierProfile&id=" . $_SESSION["user"]->getId());
                    }
                }
            } elseif ($_GET['page']  == 'profile') {
                if (isset($_SESSION["user"])) {


                    if ($_GET["id"] || $_SESSION["user"]->getId()) {
                        $id_user = $_GET["id"];




                        $user = $profileModele->getUserCon($id_user);
                        $profile = $profileModele->getProfileUser($id_user);

                        if (isset($_POST["publication"])) {

                            $p = $profileModele->addPost($_POST);
                            if ($p == null) {
                                header("location:index.php?page=profile&id=" . $_SESSION["user"]->getId());
                                exit;
                            } else {
                                $message = "Publication non envoyé";
                            }
                        }

                        $posts = $profileModele->getPosts($id_user);


                        //on verifi si linvitation à été envoyé
                        $GestionAmitierModele = new GestionAmitierModele;
                        $user_id1_connecte = $_SESSION["user"]->getId();
                        $user_id2_get = $_GET["id"];
                        $verifInvitation = $GestionAmitierModele->VerifInvitation($user_id1_connecte,  $user_id2_get);




                        require "views/profile.php";
                    } else {

                        header("location:index.php");
                        exit;
                    }
                } else {
                    header("location:index.php");
                    exit;
                }
            }
        }
    }
}
