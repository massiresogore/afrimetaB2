<?php

class GestionAmitierModele extends AbstractModele
{
    public function sendInvitation(int $user_id1, int $user_id2)
    {

        //$_session["id] demande amitier a id reçu
        $req = $this->executeRequete("INSERT INTO user_relations(user_id1, user_id2) VALUE(?,?)", [
            $user_id1,
            $user_id2
        ]);
    }
    public function annulerInvitation(int $user_id1, int $user_id2)
    {

        //$_session["id] demande amitier a id reçu
        $req = $this->executeRequete("DELETE FROM user_relations WHERE user_id1=? AND user_id2=? ", [
            $user_id1,
            $user_id2
        ]);
    }
}
