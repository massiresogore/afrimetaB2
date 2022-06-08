<?php

namespace App\Models;

use App\Core\Db;

/**
 * 
 */
class Model extends Db
{
    protected $table;

    public function findAll()
    {
        echo $this->table;
    }
}