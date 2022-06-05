<?php


namespace App\modeles;

class GestionAmitierModele extends AbstractModele
{
    public function sendInvitation(int $id_demandeur, int $id_receveur)
    {
        //$_session["id] demande amitier a id reçu
        $req = $this->executeRequete("INSERT INTO relation (id_demandeur, id_receveur) VALUE(?,?)", [
            $id_demandeur,
            $id_receveur
        ]);
        $enregistrementRow = $req->rowCount();

        if ($enregistrementRow) {
            return true;
        } else {
            return false;
        }
    }

    public function VerifInvitation(int $id_demandeur, int $id_receveur)
    {

        $req = $this->getBd()->prepare("SELECT * FROM relation WHERE (id_demandeur=:id_demandeur AND  id_receveur=:id_receveur) OR (id_demandeur =:id_receveur AND id_receveur =:id_demandeur)");

        $req->execute([
            ":id_demandeur" => $id_demandeur,
            ":id_receveur" => $id_receveur
        ]);

        $stm = $req->fetch();
        return $stm;
    }

    public function annulerInvitation(int $id_demandeur, int $id_receveur)
    {

        //$_session["id] demande amitier a id reçu
        $req = $this->executeRequete("DELETE FROM relation WHERE id_demandeur=? AND id_receveur=? ", [
            $id_demandeur,
            $id_receveur
        ]);

        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    public function verifstatut($id_demandeur, $id_receveur)
    {
        //on verifie si le lien à été envoyé
        $req = $this->executeRequete("SELECT * FROM relation WHERE (id_demandeur =:id_demandeur AND id_receveur=:id_receveur) OR (id_demandeur =:id_receveur AND id_receveur=:id_demandeur)", [
            "id_demandeur" => $id_demandeur,
            "id_receveur" => $id_receveur
        ]);
        $req->execute();
        $stm =  $req->fetch();
        $req->closeCursor();
        return $stm;
        if ($stm) {
            return true;
        } else {
            return false;
        }
    }
}