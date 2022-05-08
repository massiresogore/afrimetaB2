<?php

class ResetPasswordModele extends AbstractModele
{
    public static $errormail;

    public function resetPassword($email)
    {
        try {
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Veuillez entrer une adresse email valid");
            } else {

                //Recup email pour verif
                $req = Parent::getUser('users', 'email', $email);
                $result = $req->fetch();
                $nombre = $req->rowCount();

                if ($nombre != '1') {
                    throw new Exception("Votre adresse email ne correspond a aucun utilisateur de notre reseau blog");
                } else {

                    //verif si email pour active
                    if ($result["active"] != "1") {

                        $token = $this->token_random_string(20);
                        $req = $this->getBd()->prepare("UPDATE users SET token = ? WHERE email= ?");
                        $req->execute([$token, $email]);
                        $ma = Parent::sendMail($token, $email);
                        if ($ma == null) {
                            header('location:index.php?page=message');
                            exit;
                        } else {
                            throw new Exception("Email non envoyé");
                        }
                    } else {

                        echo "ok";
                        die;
                    }
                }
            }
        } catch (Exception $e) {
            static::$errormail = $e->getMessage();
        }
    }
}
