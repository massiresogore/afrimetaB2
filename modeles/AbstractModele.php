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
}
