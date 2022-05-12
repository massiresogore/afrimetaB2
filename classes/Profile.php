<?php

class Profile
{
    public $id;
    public $id_user;
    public $image;
    public $ville;
    public $pays;
    public $sexe;
    public $github;
    public $facebook;
    public $biographie;
    public $disponibilite;

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
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function setId_user($id_user)
    {
        return $this->id_user = $id_user;
    }
    public function setImage($image)
    {
        return $this->image = $image;
    }
    public function setVille($ville)
    {
        return $this->ville = $ville;
    }
    public function setPays($pays)
    {
        return $this->pays = $pays;
    }

    public function setSexe($sexe)
    {
        return $this->sexe = $sexe;
    }
    public function setGithub($github)
    {
        return $this->github = $github;
    }
    public function setFacebook($facebook)
    {
        return $this->facebook = $facebook;
    }
    public function setBiographie($biographie)
    {
        return $this->biographie = $biographie;
    }
    public function setDisponibilite($disponibilite)
    {
        return $this->disponibilite = $disponibilite;
    }

    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getId_user()
    {
        return $this->id_user;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getville()
    {
        return $this->ville;
    }
    public function getPays()
    {
        return $this->pays;
    }
    public function getSexe()
    {
        return $this->sexe;
    }
    public function getGithub()
    {
        return $this->github;
    }
    public function getFacebook()
    {
        return $this->facebook;
    }
    public function getBiographie()
    {
        return $this->biographie;
    }
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }
}
