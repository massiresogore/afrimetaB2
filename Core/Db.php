<?php

namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO
{
    private static $instance;

    // Informations de la connexion 
    private  const DBHOST = "localhost:8000";
    private  const DBUSER = "root";
    private  const DBNAME = "afrimeta";
    private  const DBPASSWORD = "";



    private  function __construct()
    {
        //dsn de la connexion
        $d_sn = "mysql:dbname=" . self::DBNAME . ";host" . self::DBHOST;
        try {
            //on appelle le constructeur parent
            parent::__construct($d_sn, self::DBUSER, self::DBPASSWORD);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}