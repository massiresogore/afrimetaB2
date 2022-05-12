<?php

class ProfileModele extends AbstractModele
{
    public static $errorProfile;


    public function getUserCon($id_user)
    {
        $req = $this->executeRequete("SELECT * FROM users WHERE id = ?", [$id_user]);
        $stm = $req->fetch();
        $user = new User($stm);
        return $user;
        $stm = $req->closeCursor();
    }

    public function getUserProfile($id_user)
    {
        $req = $this->executeRequete("SELECT * FROM profile WHERE id_user = ?", [$id_user]);
        $stm = $req->fetch();
        $profile = new Profile($stm);
        return $profile;
        $stm = $req->closeCursor();
    }

    public function disponible($data)
    {
        if ($data == 0) {
            return "non disponible";
        } else {
            return "disponible";
        }
    }

    public function updateProfile($data = [], int $id_user)
    {
        try {

            $profile = new Profile($data);

            if (isset($_FILES)) {
                if ($_FILES["image"]["error"] != 0) {
                    // image n'esxiste => on met à jour
                    $photo = null;
                    echo "pas d'image";
                } else {
                    // image existe => on met à jours
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

                        echo "profile mis a jours";
                        Parent::redirect('profile');
                    }
                }
            }
        } catch (Exception $e) {
            static::$errorProfile = $e->getMessage();
        }
    }
}
