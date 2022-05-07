<?php

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
}
