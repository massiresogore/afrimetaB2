<?php

class User_relation
{
    public $user_id1;
    public $user_id2;
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
    public function setUser_id1($user_id1)
    {
        $this->user_id1 = $user_id1;
    }
    public function setUser_id2($user_id2)
    {
        $this->user_id2 = $user_id2;
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
    public function getUser_id1()
    {
        return $this->user_id1;
    }
    public function getUser_id2()
    {
        return $this->user_id2;
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
