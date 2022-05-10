<?php session_start() ?>
<?php

/********** Classes links **********/
require "classes/users.php";




/********** Controllers links **********/
require "controllers/UrlAccueil.php";
require "controllers/register.php";
require "controllers/UrlValidateMail.php";
require "controllers/UrlMessage.php";
require "controllers/UrlConnexion.php";
require "controllers/UrlResetPassword.php";



/********** Modeles  **********/
require "modeles/AbstractModele.php";
require "modeles/RegisterModele.php";
require "modeles/ValidateMailModele.php";
require "modeles/ConnexionModele.php";
require "modeles/ResetPasswordModele.php";




$UrlAccueil = new UrlAccueil;
$UrlAccueil->getUrlAccueil();

$UrlRegister = new UrlRegister;
$UrlRegister->getUrlRegister();

$UrlValidateMail = new UrlValidateMail;
$UrlValidateMail->getUrlValidateMail();

$UrlMessage = new UrlMessage;
$UrlMessage->getUrlMessage();

$UrlConnexion = new UrlConnexion;
$UrlConnexion->getUrlConnexion();

$UrlResetPassword = new UrlResetPassword;
$UrlResetPassword->getUrlResetPassword();
