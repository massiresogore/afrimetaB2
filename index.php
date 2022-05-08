
<?php

/********** Controllers links **********/
require "controllers/UrlAccueil.php";
require "controllers/register.php";
require "controllers/UrlValidateMail.php";
require "controllers/UrlMessage.php";
require "controllers/UrlConnexion.php";


/********** Modeles  **********/
require "modeles/AbstractModele.php";
require "modeles/RegisterModele.php";
require "modeles/ValidateMailModele.php";
require "modeles/ConnexionModele.php";




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
