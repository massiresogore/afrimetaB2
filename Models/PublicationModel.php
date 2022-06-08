<?php

namespace App\Models;


class PublicationModel extends Model
{
    public $id_publication;
    public $id_utilisateur;
    public $posts;
    public $create_at;


    public function __construct()
    {
        $this->table = "publication";
    }




    /**
     * @return mixed
     */
    public function getIdPublication()
    {
        return $this->id_publication;
    }

    /**
     * @param mixed $id_publication
     *
     * @return self
     */
    public function setIdPublication($id_publication)
    {
        $this->id_publication = $id_publication;

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
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param mixed $posts
     *
     * @return self
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * @param mixed $create_at
     *
     * @return self
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }
}