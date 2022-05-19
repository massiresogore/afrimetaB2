
<?php

/********** Classes links **********/
require "classes/User.php";
session_start();
require "classes/Profile.php";
require "classes/Publication.php";
require "classes/User_relation.php";




/********** Controllers links **********/
require "controllers/UrlAccueil.php";
require "controllers/UrlRegister.php";
require "controllers/UrlValidateMail.php";
require "controllers/UrlMessage.php";
require "controllers/UrlConnexion.php";
require "controllers/UrlProfile.php";
require "controllers/UrlResetPassword.php";
require "controllers/UrlGestionAmitier.php";




/********** Modeles  **********/
require "modeles/AbstractModele.php";
require "modeles/RegisterModele.php";
require "modeles/ValidateMailModele.php";
require "modeles/ConnexionModele.php";
require "modeles/ResetPasswordModele.php";
require "modeles/ProfileModele.php";
require "modeles/GestionAmitierModele.php";

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
