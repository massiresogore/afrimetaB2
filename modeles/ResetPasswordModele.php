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

                    //verif si email n'est pas active
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
                        //on verif  si l'email  confirmee  a deja fait la recup ou pas
                        $token = Parent::token_random_string(20);
                        $req = Parent::getUser('resetPassword', 'email', $email);
                        $stm1 = $req->fetch();

                        if ($stm1) {
                            //si oui on met a jour
                            $reUpdte = Parent::getBd()->prepare("UPDATE  afrimeta.resetPassword SET email=?, token=?");
                            $stmUpdte = $reUpdte->execute([$email, $token]);
                            if ($stmUpdte) {
                                $mailSend = Parent::sendMail2($token, $email, 'Reinisialiser votre mot de passe', 'newPassword');
                                if ($mailSend == null) {
                                    header('location:index.php?page=message&message=reinitialisation');
                                    exit;
                                } else {
                                    throw new Exception("Email non envoyé");
                                }
                            } else {
                                throw new Exception(" mail non envoye");
                            }
                        } else {
                            // si non on fait une  insertion
                            $req2 = Parent::getBd()->prepare("INSERT INTO afrimeta.resetPassword(email,token) VALUES(:email,:token)");
                            $req2->bindValue(":email", $email);
                            $req2->bindValue(":token", $token);
                            $req2->execute();
                            $stm2 = $req2->rowCount();
                            if ($stm2) {
                                throw new Exception("un mail vous est envoye");
                            } else {
                                throw new Exception(" mail non envoye");
                            }
                        }
                    }
                }
            }
        } catch (Exception $e) {
            static::$errormail = $e->getMessage();
        }
    }
}
