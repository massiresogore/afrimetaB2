
<?php

class ConnexionModele extends AbstractModele
{
    public static $message;



    public function setConnexion(array $data)
    {


        try {
            extract($data);

            //get user Email
            $req = $this->executeRequete("SELECT * FROM users WHERE email =?", [$email]);
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
                        $user = new User($stm);
                        $_SESSION["user"] = $user;

                        // gestion cookies
                        if (isset($_POST["checkbox"])) {
                            setcookie("email", $_POST["email"]);
                            setcookie('password', $_POST["password"]);
                        } else {

                            if (isset($_COOKIE["emai"])) {
                                setcookie($_COOKIE["email"], "");
                            }

                            if (isset($_COOKIE["password"])) {
                                setcookie($_COOKIE["password"], "");
                            }
                        }

                        header('location:index.php');
                        exit;
                    } else {
                        throw new Exception("Mot de passe incorrect. Réessayez ou cliquez sur Mot de passe oublié pour le réinitialiser. ");
                    }
                }
            }
        } catch (Exception $e) {
            static::$message = $e->getMessage();
        }
    }
}
