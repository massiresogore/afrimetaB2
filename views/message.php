<?php ob_start(); ?>

<h1>Votre adresse Email n'est pas encore activé,nous vous avons envoyé par courrier des instructions pour confirmer votre adresse email, merci de le consulter et de cliquer sur confirmer afin de vous connecter </h1>







<?php $content =  ob_get_clean();
require "template.php"; ?>