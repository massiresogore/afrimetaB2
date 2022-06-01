<?php

use App\Autoloader;

use App\controllers\{UrlAccueil, UrlConnexion, UrlGestionAmitier, UrlMessage, UrlProfile, UrlRegister, UrlResetPassword, UrlValidateMail};

use App\modeles\{RegisterModele, AbstractModele, ConnexionModele, GestionAmitierModele, ProfileModele, ResetPasswordModele, ValidateMailModele};

require_once "Autoloader.php";
Autoloader::register();

session_start();

$UrlAccueil = new UrlAccueil;
$UrlAccueil->getUrlAccueil();

$UrlRegister = new UrlRegister;
$UrlRegister->getUrlRegister();

$UrlProfile = new UrlProfile;
$UrlProfile->getUrlProfile();

$UrlValidateMail = new UrlValidateMail;
$UrlValidateMail->getUrlValidateMail();

$UrlMessage = new UrlMessage;
$UrlMessage->getUrlMessage();

$UrlConnexion = new UrlConnexion;
$UrlConnexion->getUrlConnexion();

$UrlResetPassword = new UrlResetPassword;
$UrlResetPassword->getUrlResetPassword();

$UrlGestionAmitier = new UrlGestionAmitier;
$UrlGestionAmitier->getUrlAjouAmi();
