<?php

class ProfileModele extends AbstractModele
{

    public function updateProfileData($data = [], $id_user)
    {
    }

    //recuperer les infos de User Connecté;
    public function getUserInfo($id_user)
    {
        $req = $this->executeRequete("SELECT * FROM users WHERE id = ?", [$id_user]);
        $stm = $req->fetch();
        $user = new User($stm);
        return $user;
    }
}
