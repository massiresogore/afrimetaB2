<?php

// use App\Models\Publication;

use App\Autoloader;
use App\Models\ProfileModel;
use App\Models\UtilisateurModel;

require_once "Autoloader.php";

Autoloader::register();

$utilisateur = new UtilisateurModel;
$profile = new ProfileModel;
$profile1 = $profile->findAll();