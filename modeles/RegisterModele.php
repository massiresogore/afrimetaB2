<?php



class RegisterModele extends AbstractModele
{
    public static $message;

    // Si le formulaire a ete soumis
    public function Register($dataRegistred)
    {
        try {

            if (!empty($_POST['name']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {

                extract($_POST);
                if (!preg_match('/[a-zA-Z0-9 ]/', $pseudo)) {
                    throw new Exception("Votre pseudo doit être une chaine de caractéres alphanumérique !");
                } elseif (!preg_match('/[a-zA-Z0-9 ]/', $name)) {
                    throw new Exception("Votre nom doit être une chaine de caractéres alphanumérique !");
                } elseif (mb_strlen($pseudo) < 3) {
                    throw new Exception("pseudo trop court minimum 3 caractères");
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("Email invalid");
                } elseif (mb_strlen($password) < 6) {
                    throw new Exception("Mot de passe trop court minimum 6 caractères");
                } elseif ($password != $password_confirm) {
                    throw new Exception("Les deux mot de passe se sont pas identiques");
                } else {

                    $token = $this->token_random_string(20);
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);






                    // on verification de l'unicite de Pseudo
                    $reqPseudo  = $this->getBd()->prepare("SELECT * FROM users WHERE pseudo = :pseudo ");
                    $reqPseudo->bindValue(":pseudo", $pseudo);
                    $reqPseudo->execute();
                    $resultPseudo = $reqPseudo->fetch();

                    // on verification de l'unicite de Email
                    $reqEmail  = $this->getBd()->prepare("SELECT * FROM users WHERE email = :email ");
                    $reqEmail->bindValue(":email", $email);
                    $reqEmail->execute();
                    $resultEmail = $reqEmail->fetch();

                    if ($resultPseudo) {
                        throw new Exception("Le pseudo que vous avez choisi existe déjà");
                    } elseif ($resultEmail) {
                        throw new Exception("Le mail que vous avez choisi existe déjà");
                    } else {

                        $requete = $this->getBd()->prepare('INSERT INTO `users`( `name`, `pseudo`, `email`, `password`, `token`) VALUES (:name, :pseudo, :email, :password, :token)');

                        $requete->bindvalue(':name', $name);
                        $requete->bindvalue(':pseudo', $pseudo);
                        $requete->bindvalue(':email', $email);
                        $requete->bindvalue(':password', $password);
                        $requete->bindvalue(':token', $token);
                        $stm =  $requete->execute();
                        if ($stm) {

                            //applel de la function denvoie demail

                            throw new Exception("Un mail de confirmation vous a été envoyé, merci de consulter et de cliquer sur confirmer afin de vous connecter");
                            $ma = Parent::sendMail($token, $email);
                            if ($ma == null) {
                                header('location:index.php?page=register');
                                exit;
                            }
                        } else {

                            throw new Exception("Inscription échoué Veuiller");
                        }
                    }
                }
            }
        } catch (Exception $e) {
            self::$message = $e->getMessage();
        }
    }


    // public function getUsers()
    // {

    //     $req = $this->getBd()->prepare("SELECT * FROM users ");
    //     $req->execute();
    //     $stm = $req->fetch();
    // }
}
