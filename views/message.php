<?php ob_start(); ?>

<h1><?= (isset($message) ? $message : "") ?></h1>
<p>Votre <span><?= (isset($message) ? $message : "") ?></span> n'est pas encore activé,nous vous avons envoyé par courrier des instructions pour confirmer votre adresse email, merci de le consulter et de cliquer sur confirmer afin de vous connecter </p>




<?php $content =  ob_get_clean();
require "template.php"; ?>