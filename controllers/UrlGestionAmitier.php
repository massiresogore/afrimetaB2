<?php


class UrlGestionAmitier
{

    public function getUrlAjouAmi()
    {
        if (isset($_GET['page']) && isset($_GET["id"])) {

            if (!empty($_GET["id"] && $_SESSION["user"]->getId() != $_GET["id"])) {
                if ($_GET['page']  == 'ajout_ami') {


                    $id_receveur = $_GET["id"];
                    $id_demandeur = $_SESSION["user"]->getId();

                    $AjouAmiModele = new GestionAmitierModele;
                    $ajout = $AjouAmiModele->sendInvitation($id_demandeur, $id_receveur);
                    if ($ajout) {
                        header("location:index.php?page=profile&id=" . $id_receveur);
                        exit;
                    } else {
                        header("location:index.php?page=profile&id=" . $id_receveur);
                        exit;
                    }
                } elseif ($_GET['page']  == 'annuler_la_demande') {
                    $id_receveur = $_GET["id"];
                    $id_demandeur = $_SESSION["user"]->getId();
                    $GestionAmitierModele = new GestionAmitierModele;
                    $annuler_la_demande = $GestionAmitierModele->annulerInvitation($id_demandeur, $id_receveur);

                    if ($annuler_la_demande) {
                        header("location:index.php?page=profile&id=" . $id_receveur);
                        exit;
                    } else {
                        header("location:index.php");
                        exit;
                    }
                }
            }
        }
    }
}
