<?php



class ValidateMailModele extends AbstractModele
{

    public function getValidateMail($email, $token)
    {
        if (!empty($email) && !empty($token)) {

            $requette = $this->getBd()->prepare('SELECT * FROM users WHERE email=:email and token=:token');
            $requette->bindValue(":email", $email);
            $requette->bindValue(":token", $token);
            $requette->execute();
            $nombre = $requette->rowCount();

            if ($nombre == 1) {
                self::update($email, $token);
            }
        }
    }

    public function update($email, $token)
    {
        $requette = $this->getBd()->prepare('UPDATE users SET token=:token, active=:active WHERE email=:email');
        $requette->bindValue(":token", 'valide');
        $requette->bindValue(":active", 1);
        $requette->bindValue(":email", $email);
        $resultatUpadate = $requette->execute();

        if ($resultatUpadate) {
            header('location:http://localhost/socialNetwork/index.php?page=connexion');
            exit;
        }
    }
}
