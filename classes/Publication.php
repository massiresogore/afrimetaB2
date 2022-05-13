<?php


class Publication
{
    public $id;
    public $id_user;
    public $posts;
    public $create_at;


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
        $this->id = $id;
    }
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;
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
    public function getPosts()
    {
        return $this->posts;
    }
    public function getCreate_at()
    {
        return $this->create_at;
    }
}
