<?php

// use App\Models\Publication;

use App\Autoloader;
use App\Models\Utilisateur;

//require 'views/template.php';
//require "Models/Utilisateur.php";
require_once "Autoloader.php";

Autoloader::register();

$us = new Utilisateur;

$us->setNom('Massire');

echo $us->getNom();