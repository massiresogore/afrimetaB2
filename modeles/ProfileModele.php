<?php

class ProfileModele extends AbstractModele
{
    public static $errorProfile;


    public function getUserCon($id_user)
    {
        $req = $this->executeRequete("SELECT * FROM users WHERE id = ?", [$id_user]);
        $stm = $req->fetch();
        $user = new User($stm);
        $req->closeCursor();
        return $user;
    }

    public function getProfileUser($id_user)
    {
        $req = $this->executeRequete("SELECT * FROM profile WHERE id_user =?", [$id_user]);
        $stm = $req->fetch();
        $profile = new Profile($stm);
        return $profile;
    }

    public function getProfiles()
    {
        $req = $this->executeRequete("SELECT * FROM profile");
        $stm = $req->fetchAll();
        $profiles = new Profile($stm);

        return $profiles;
    }


    public function addProfile($data = [], int $id_user)
    {
        try {

            $profile = new Profile($data);

            if (isset($_FILES["image"])) {

                if ($_FILES["image"]["size"] == 0) {

                    // image n'esxiste => on insert les données
                    $requete = $this->executeRequete("INSERT INTO `profile`(`id_user`,`ville`, `pays`, `sexe`, `github`, `facebook`, `biographie`, `disponibilite`) VALUES (?,?,?,?,?,?,?,?);", [$id_user, $profile->getVille(), $profile->getPays(), $profile->getSexe(), $profile->getGithub(), $profile->getFacebook(), $profile->getBiographie(), $profile->getDisponibilite()]);
                    $requete->closeCursor();
                    //on rafraichi la page
                    Parent::redirect('modifierProfile');
                } else {
                    // image existe =>  on insert les données
                    $img = $_FILES;
                    $ajout =  $this->addImage($img, $id_user);
                    if ($ajout != null) {
                        throw new Exception("Image non enregistrer");
                    } else {

                        $photo = $_FILES["image"]["name"];
                        //on envoi des données dans la base de donnée
                        $requete = $this->executeRequete("INSERT INTO `profile`(`id_user`, `image`, `ville`, `pays`, `sexe`, `github`, `facebook`, `biographie`, `disponibilite`) VALUES (?,?,?,?,?,?,?,?,?);", [$id_user, $photo, $profile->getVille(), $profile->getPays(), $profile->getSexe(), $profile->getGithub(), $profile->getFacebook(), $profile->getBiographie(), $profile->getDisponibilite()]);
                        $requete->closeCursor();




                        //on rafraichi la page
                        Parent::redirect('modifierProfile');
                    }
                }
            }
        } catch (Exception $e) {
            static::$errorProfile = $e->getMessage();
        }
    }
    public function updateProfile($data = [], $id_user)
    {

        try {

            $profile = new Profile($data);

            if (isset($_FILES["image"])) {

                if ($_FILES["image"]["size"] == 0) {
                    // image n'esxiste => on met à jour
                    $requete = $this->executeRequete("UPDATE `profile` SET `id_user`= ?,`ville`=?, `pays`=?, `sexe`=?, `github`=?, `facebook`=?, `biographie`=?, `disponibilite`=?", [$id_user, $profile->getVille(), $profile->getPays(), $profile->getSexe(), $profile->getGithub(), $profile->getFacebook(), $profile->getBiographie(), $profile->getDisponibilite()]);
                    $requete->closeCursor();
                    //on rafraichi la page
                    Parent::redirect('modifierProfile');
                } else {
                    // image existe => on met à jours
                    $img = $_FILES;
                    $ajout =  $this->addImage($img, $id_user);
                    if ($ajout != null) {
                        throw new Exception("Image non enregistrer");
                    } else {
                        $photo = $_FILES["image"]["name"];
                        //on envoi des données dans la base de donnée



                        //var_dump($_POST);



                        $requete = $this->executeRequete("UPDATE  `profile` SET `id_user`=?, `image`=?, `ville`=?, `pays`=?, `sexe`=?, `github`=?, `facebook`=?, `biographie`=?, `disponibilite`=?", [$id_user, $photo, $profile->getVille(), $profile->getPays(), $profile->getSexe(), $profile->getGithub(), $profile->getFacebook(), $profile->getBiographie(), $profile->getDisponibilite()]);
                        $requete->closeCursor();
                        //on rafraichi la page
                        Parent::redirect('modifierProfile');
                    }
                }
            }
        } catch (Exception $e) {
            static::$errorProfile = $e->getMessage();
        }
    }


    public function addPost($data = [])
    {


        $publication = new Publication($data);
        $req = $this->executeRequete("INSERT INTO publications(id_user, posts) VALUES (:id_user,:posts)", [
            ":id_user" => $_SESSION["user"]->getId(),
            ":posts" => $publication->getPosts()
        ]);
    }
    public function getPosts($id_user)
    {

        $req = $this->executeRequete("SELECT * FROM publications WHERE id_user=? ORDER BY create_at DESC ", [$id_user]);


        while ($stm = $req->fetch()) {
            $objet = new Publication($stm);
            $tab[] = $objet;
        }

        if (isset($tab)) {
            return $tab;
        } else {
            return false;
        }
    }
}
