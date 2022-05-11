<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

abstract class AbstractModele
{


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


    function token_random_string($leng = 20)
    {

        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $leng; $i++) {
            $token .= $str[rand(0, strlen($str) - 1)];
        }
        return $token;
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
        $req = $this->getBd()->prepare($query);
        if (isset($data) && !empty($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = htmlentities($value);
            }
        }
        $req->execute($data);
        return $req;
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
            $extenValide = ["jpg", "jpeg", "png"];

            if ($imgSize > 300000) {
                throw new Exception("image trop grande");
            } elseif ($imgError != 0) {
                throw new Exception("image incorrect");
            } elseif (!in_array($imgExtension, $extenValide)) {
                throw new Exception("extetion non valide");
            } else {

                //On test si le repertoire existe 
                $cheminImg = "asset/images/profile" . $id_user;
                $verifReper = $this->is_rep_exist($cheminImg);

                // si oui 
                if ($verifReper) {
                    //On test si le fichier existe 
                    $filepath = $cheminImg . '/' . $imgName;
                    $verifFile = $this->is_file_existe($filepath);

                    if ($verifFile) {
                        //fichier existe
                        throw new Exception("nom image deja utilisé");
                    } else {
                        //fichier no existe
                        move_uploaded_file($imgSaveTemporaire, $filepath);
                    }

                    // On test si le repertoire n'existe pas
                } else {

                    //create folder
                    $filepath = $cheminImg . '/' . $imgName;
                    $cheminImg = "asset/images/profile" . $id_user;
                    mkdir($cheminImg, 0777, true);

                    // move folder
                    move_uploaded_file($imgSaveTemporaire, $filepath);
                }
            }
        } catch (Exception $e) {
            $messgeImg = $e->getMessage();
        }
    }
}
