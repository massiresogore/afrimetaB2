<?php

class User_relation
{
    public $id_demandeur;
    public $id_receveur;
    public $status;
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

    //setters
    public function setId_demandeur($id_demandeur)
    {
        $this->id_demandeur = $id_demandeur;
    }
    public function setId_receveur($id_receveur)
    {
        $this->id_receveur = $id_receveur;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;
    }

    //getters
    public function getId_demandeur()
    {
        return $this->id_demandeur;
    }
    public function id_receveur()
    {
        return $this->id_receveur;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getCreate_at()
    {
        return $this->create_at;
    }
}
