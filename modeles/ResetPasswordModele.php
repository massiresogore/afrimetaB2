<?php


namespace App\modeles;

use FFI\Exception;

class ResetPasswordModele extends AbstractModele
{
    public static $errormail;
    public static $errorpassword;

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

                    // if ($result["token"] == "valide") {
                    //     var_dump($result["id"]);
                    //     die;
                    // }

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
                                // je dois changer cette fonction sendmail afin de rediriger lutilisateur
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

                            $req2 = Parent::getBd()->prepare("INSERT INTO afrimeta.resetPassword(id_user,email,token) VALUES(:id_user,:email,:token)");
                            $req2->bindValue(":id_user", $result["id"]);
                            $req2->bindValue(":email", $email);
                            $req2->bindValue(":token", $token);
                            $req2->execute();
                            $stm2 = $req2->rowCount();
                            if ($stm2) {
                                $mailSend = Parent::sendMail2($token, $email, 'Reinisialiser votre mot de passe', 'newPassword');
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


    public function saveNewPassword($data = [], string $email, $token)
    {
        try {
            if (!empty($data["password"]) && !empty($data["password_confirm"])) {

                //verif ident psw
                if ($data["password"] == $data["password_confirm"]) {
                } else {
                    throw new Exception("Les deux mot de passe ne sont pas identiques");
                }

                $password = password_hash($data['password'], PASSWORD_DEFAULT);
                //verif email 


                $req1 = Parent::getUser('resetPassword', 'email', $email);
                $req1->fetch();
                $stmReq1 = $req1->rowCount();

                // si faux
                if ($stmReq1 != 1) {
                    throw new Exception("Email non valide");
                }

                //verif token 
                $req2 = Parent::getUser('resetPassword', 'token', $token);
                $req2->fetch();
                $stmReq2 = $req2->rowCount();

                // si faux
                if ($stmReq2 != 1) {
                    throw new Exception("Token non valide");
                }

                if ($stmReq2 == 1 && $stmReq2 == 1) {
                    //mis a jour de psw dans table users
                    $majPsw = Parent::getBd()->prepare("UPDATE users SET password=:password WHERE email=:email");
                    $majPsw->bindValue(":password", $password);
                    $majPsw->bindValue(":email", $email);
                    $result = $majPsw->execute();

                    if ($result) {

                        header('location:index.php?page=connexion&message=Mot de passe reinitialisé avec succès veuillez cliquez sur connexion pour vous connecter');
                        exit;
                    } else {
                        throw new Exception("Mis à jour de mot de passe à échoué");
                    }
                }
            } else {
                throw new Exception("Tous les champs doivent etre rempli");
            }
        } catch (Exception $e) {
            self::$errorpassword = $e->getMessage();
        }
    }
}
