<?php

class ProfileModele extends AbstractModele
{
    public function updateProfile($data = [], int $id_user)
    {
        if (isset($_FILES)) {
            $img = $_FILES;
            $ajout =  $this->addImage($img, $id_user);
        } else {
            //mis a jours donnee..

        }


        // if($ajout == null) = Image enregistrer
    }

    //On recupere les infos de User Connecté;
    public function getUserCon($id_user)
    {
        $req = $this->executeRequete("SELECT * FROM users WHERE id = ?", [$id_user]);
        $stm = $req->fetch();
        $user = new User($stm);
        return $user;
    }
}
