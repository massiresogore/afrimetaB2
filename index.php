<?php

// use App\Models\Publication;

use App\Autoloader;
use App\Models\ProfileModel;
use App\Models\UtilisateurModel;

require_once "Autoloader.php";
Autoloader::register();

$us = new UtilisateurModel;

$us->delete(1);