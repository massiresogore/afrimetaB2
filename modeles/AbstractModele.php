<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

abstract class AbstractModele
{
    public static $errorProfil2;


    public function getBd()
    {

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=afrimeta", "root", "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            return $pdo;
        } catch (Exception $e) {
            die("Exception attrapée  :" . $e->getMessage());
        }
    }

    public function getUser($table, $name_where, $value)
    {
        $req = $this->getBd()->prepare("SELECT * FROM $table WHERE $name_where=?");
        $req->execute([$value]);


        return $req;
    }


    function token_random_string($leng = 20)
    {

        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $leng; $i++) {
            $token .= $str[rand(0, strlen($str) - 1)];
        }
        return $token;
    }

    public function VerifInvitation($user_id1_connecte,  $user_id2_get)
    {
        $req = $this->executeRequete("SELECT user_id1, user_id2 status FROM user_relations WHERE (user_id1 =:user_id1 AND user_id2 =:user_id2) OR  (user_id1 =:user_id2 AND user_id2 =:user_id1)", [
            "user_id1" => $user_id1_connecte,
            "user_id2" => $user_id2_get
        ]);

        $stm = $req->fetch();
        if ($stm) {
            //si lutulistateur a reçu une demande d'amitier
            if ($stm["user_id1"] == $user_id2_get && $stm["status"] == '0') {
                //lien pour accepter poue refuser la demande d'amitier
                return "ajouter ou rejeter une demande";
            } elseif ($stm["user_id1"] == $user_id1_connecte && $stm["status"] == '0') {
                //msg pour dire que la demande a deja ete envoyer : lien pour anuler la demande
                return "annuler ou rejeter une demande";
            } elseif (($stm["user_id1"] == $user_id1_connecte) or ($stm["user_id1"] == $user_id2_get) and ($stm["status"] == '1')) {
                //lien pour supprimer lamitier
                return "supprimer demande";
            } else {
                //lien pour ajouter un ami
                return "ajouter un ami ";
            }
        } else {
            return false;
        }
    }




    public static function sendMail($token, $email)
    {


        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'afrimetanetwork@gmail.com';
        $mail->Password   = 'massire123456';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    /*TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`*/

        //Recipients
        $mail->setFrom('afrimetanetwork@gmail.com', 'Afrimeta');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation';
        $mail->Body = 'Afin de valider votre adresse email, merci de cliquer sur le lien suivant:

            <a href="http://localhost/socialNetwork/index.php?page=validation&token=' . $token . '&email=' . $email . ' ">Cliquez ici pour confirmer votre compte</a>';

        // $mail->send(); faire vard_dump de ça si email not send   
        $mail->send();
    }

    // public function getUser($table, $nameWhere, $value)
    // {
    //     $req = $this->getBd()->prepare("SELECT * FROM $table WHERE $nameWhere = ?");
    //     $req->execute([$value]);
    //     return $req;
    // }


    public function executeRequete($query, array $data = [])
    {
        $requet = $this->getBd()->prepare($query);
        if (isset($data) && !empty($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = htmlentities($value);
            }
        }
        $requet->execute($data);
        return $requet;
    }
    public function textToMail($text)
    {
        $regex_url = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
        return preg_replace($regex_url, "<a href=\"$0\" target=\"_blank\">$0</a>", $text);
    }




    public static function sendMail2($token, $email, $objet, $lien)
    {


        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'afrimetanetwork@gmail.com';
        $mail->Password   = 'massire123456';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    /*TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`*/

        //Recipients
        $mail->setFrom('afrimetanetwork@gmail.com', 'Afrimeta');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = $objet;
        $mail->Body = 'Afin de ' . $objet . ', merci de cliquer sur le lien suivant:

            <a href="http://localhost/socialNetwork/index.php?page=' . $lien . '&message=' . $objet . '&token=' . $token . '&email=' . $email . ' ">Cliquez ici pour ' . $objet . ' votre compte</a>';

        // $mail->send(); faire vard_dump de ça si email not send   
        $mail->send();
    }


    public function is_rep_exist($chemin)
    {
        if (!file_exists($chemin) && !is_dir($chemin)) {
            return false;
        } else {
            return true;
        }
    }

    public function is_file_existe($chemin)
    {
        if (file_exists($chemin)) {
            return true;
        } else {
            return false;
        }
    }
    public function verifExtension($extension)
    {
        $extenValide = ["jpg", "jpeg", "png"];
        if (in_array($extension, $extenValide)) {
            return true;
        } else {
            return false;
        }
    }

    public function isTrue(string $data)
    {
        if ($data == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function redirect($page)
    {
        header('location:index.php?page=' . $page);
        exit;
    }

    public function addImage($img, $id_user)
    {
        try {

            //recuperation info img
            $imgInfo = pathinfo($img["image"]["name"]);
            $imgName =  $imgInfo["basename"];
            $imgExtension = $imgInfo["extension"];
            $imgSaveTemporaire = $img["image"]["tmp_name"];
            $imgSize =  $img["image"]["size"];
            $imgError = $img["image"]["error"];
            if ($imgSize > 300000) {
                throw new Exception("image trop grande");
            } else {
                $verifExten = $this->verifExtension($imgExtension);
                if ($verifExten) {
                    //On test si le repertoire existe 
                    $cheminImg = "asset/images/profile" . $id_user;
                    $verifReper = $this->is_rep_exist($cheminImg);

                    // si le rep existe  
                    if ($verifReper) {

                        //On test si le fichier existe 
                        $filepath = $cheminImg . '/' . $imgName;
                        $verifFile = $this->is_file_existe($filepath);

                        if ($verifFile) {

                            //fichier existe
                            throw new Exception("nom image deja utilisé");
                        } else {

                            //fichier  n'existe pas
                            move_uploaded_file($imgSaveTemporaire, $filepath);
                        }

                        //  si le repertoire n'existe pas
                    } else {

                        //creation de rep
                        $filepath = $cheminImg . '/' . $imgName;
                        $cheminImg = "asset/images/profile" . $id_user;
                        mkdir($cheminImg, 0777, true);

                        // depla de rep vers 
                        move_uploaded_file($imgSaveTemporaire, $filepath);
                    }
                }
            }
        } catch (Exception $e) {
            static::$errorProfil2 = $e->getMessage();
        }
    }
}
