<?php

namespace App\Models;

class passwordResetModel extends Model
{
    private $id_reinitialisePsw;
    private $id_utilisateur;
    private $email;
    private $token;


    public function __construct()
    {
        $this->table = "reinitialisePsw";
    } 


    /**
     * @return mixed
     */
    public function getIdReinitialisePsw()
    {
        return $this->id_reinitialisePsw;
    }

    /**
     * @param mixed $id_reinitialisePsw
     *
     * @return self
     */
    public function setIdReinitialisePsw($id_reinitialisePsw)
    {
        $this->id_reinitialisePsw = $id_reinitialisePsw;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * @param mixed $id_utilisateur
     *
     * @return self
     */
    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     *
     * @return self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
}

