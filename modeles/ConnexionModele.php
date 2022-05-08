<?php


class ConnexionModele extends AbstractModele
{
    public static $message;
    public static $session = [];


    public function setConnexion(array $data)
    {


        try {
            extract($data);

            //get user Email
            $req = $this->getUser('users', 'email', $email);
            $stm = $req->fetch();

            if (!$stm) {
                throw new Exception("Veuillez inserer une adresse email valide s'il vous plait");
            } elseif (isset($stm["active"])) {
                if ($stm["active"] == 0) {
                    $token = $this->token_random_string(20);
                    $req = $this->getBd()->prepare("UPDATE users SET token = ? WHERE email= ?");
                    $req->execute([$token, $email]);
                    Parent::sendMail($token, $email);
                    header('location:index.php?page=message');
                    exit;
                } else {
                    $passwordVerif = password_verify($password, $stm["password"]);

                    if ($passwordVerif) {
                        session_start();
                        $_SESSION["id"] =  $stm["id"];
                        $_SESSION["name"] =  $stm["name"];
                        $_SESSION["pseudo"] = $stm["pseudo"];
                        $_SESSION["email"] = $stm["email"];

                        // header('location:index.php');
                        // exit;

                    } else {
                        throw new Exception("Veuillez s'il vous plait inserer un mot de passe valide ");
                    }
                }
            }
        } catch (Exception $e) {
            static::$message = $e->getMessage();
        }
    }
}
