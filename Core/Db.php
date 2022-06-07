<?php

namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO
{
    private static $instance;
}