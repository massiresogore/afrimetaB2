<?php

namespace App\Models;

class Profile
{
    public $id_profile;
    public $id_utilisateur;
    public $image;
    public $ville;
    public $pays;
    public $sexe;
    public $github;
    public $facebook;
    public $biographie;
    public $disponibilite;

    public function __construct()
    {
        $this->table = "profile";
    }



    /**
     * @return mixed
     */
    public function getIdProfile()
    {
        return $this->id_profile;
    }

    /**
     * @param mixed $id_profile
     *
     * @return self
     */
    public function setIdProfile($id_profile)
    {
        $this->id_profile = $id_profile;

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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     *
     * @return self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     *
     * @return self
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     *
     * @return self
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * @param mixed $github
     *
     * @return self
     */
    public function setGithub($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param mixed $facebook
     *
     * @return self
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBiographie()
    {
        return $this->biographie;
    }

    /**
     * @param mixed $biographie
     *
     * @return self
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * @param mixed $disponibilite
     *
     * @return self
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }
}