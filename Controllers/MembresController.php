<?php

namespace App\Controllers;

class MembresController
{
    public function index()
    {
        include_once ROOT . '/Views/membres/index.php';
    }
}