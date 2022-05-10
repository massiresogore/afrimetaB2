<?php

class users
{
    public $name;
    public $pseudo;
    public $email;
    public $password;

    public $token;
    public $active;
    public $date;

    public function __construct($data = [])
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
    }

    // setters
    public function setName($name)
    {
        return $this->name = $name;
    }
    public function setPseudo($pseudo)
    {
        return $this->pseudo = $pseudo;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }
    public function setPassword($password)
    {
        return $this->password = $password;
    }


    public function setToken($token)
    {
        return $this->token = $token;
    }
    public function setActive($active)
    {
        return $this->active = $active;
    }
    public function setdate($date)
    {
        return $this->date = $date;
    }

    //getters
    public function getName()
    {
        return $this->name;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function geTtoken()
    {
        return $this->token;
    }
    public function getActive()
    {
        return $this->active;
    }
    public function getDate()
    {
        return $this->date;
    }
}