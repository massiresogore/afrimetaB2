<?php


class UrlGestionAmitier
{

    public function getUrlAjouAmi()
    {
        if (isset($_GET['page']) && isset($_GET["id"])) {

            if (!empty($_GET["id"] && $_SESSION["user"]->getId() != $_GET["id"])) {
                if ($_GET['page']  == 'ajout_ami') {
                    $user_id2 = $_GET["id"];
                    $user_id1 = $_SESSION["user"]->getId();

                    $AjouAmiModele = new GestionAmitierModele;
                    $ajout = $AjouAmiModele->sendInvitation($user_id1, $user_id2);

                    if ($ajout == null) {
                        header("location:index.php?page=profile&id=" . $_SESSION["user"]->getId());
                        exit;
                    } else {
                        header("location:indew.php");
                        exit;
                    }
                } elseif ($_GET['page']  == 'annuler_ami') {
                    $user_id2 = $_GET["id"];
                    $user_id1 = $_SESSION["user"]->getId();
                    $AjouAmiModele = new GestionAmitierModele;
                    $ajout = $AjouAmiModele->annulerInvitation($user_id1, $user_id2);

                    if ($ajout == null) {
                        header("location:index.php?page=profile&id=" . $_SESSION["user"]->getId());
                        exit;
                    } else {
                        header("location:indew.php");
                        exit;
                    }
                }
            }
        }
    }
}
