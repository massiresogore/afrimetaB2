<?php



class RegisterModele extends AbstractModele
{
    public static $message;


    // Si le formulaire a ete soumis
    public function Register($dataRegistred)
    {
        try {

            if (isset($_POST["register"])) {

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
                        $reqPseudo = $this->executeRequete("SELECT * FROM users WHERE pseudo =?", [$pseudo]);
                        $resultPseudo = $reqPseudo->fetch();

                        // on verification de l'unicite de Email
                        $reqEmail = $this->executeRequete("SELECT * FROM users WHERE email =?", [$email]);
                        $resultEmail = $reqEmail->fetch();

                        if ($resultPseudo) {
                            throw new Exception("Le pseudo que vous avez choisi existe déjà");
                        } elseif ($resultEmail) {
                            throw new Exception("Le mail que vous avez choisi existe déjà");
                        } else {

                            $user = new User($_POST);
                            $user->setToken($token);
                            $user->setPassword($password);

                            // $requete = $this->getBd()->prepare('INSERT INTO `users`( `name`, `pseudo`, `email`, `password`, `token`) VALUES (:name, :pseudo, :email, :password, :token)');
                            $requete = $this->executeRequete("INSERT INTO users(name,pseudo,email,password,token) VALUES(?,?,?,?,?)", [
                                $user->getName(), $user->getPseudo(),  $user->getEmail(), $user->getPassword(), $user->geTtoken()
                            ]);

                            if ($requete) {

                                //applel de la function denvoie demail
                                $ma = Parent::sendMail($user->geTtoken(), $user->getEmail());
                                if ($ma == null) {
                                    header('location:index.php?page=message&message=email');
                                    exit;
                                }
                            } else {

                                throw new Exception("Inscription échoué Veuiller");
                            }
                        }
                    }
                }
            }
        } catch (Exception $e) {
            self::$message =  $e->getMessage();
        }
    }

    public function getMembreActif(string $active = "1")
    {
        $req = $this->executeRequete("SELECT * FROM users WHERE active =?", [$active]);
        while ($stm = $req->fetch()) {
            $usersObject = new User($stm);
            $users[] = $usersObject;
        }
        return $users;
    }
}
