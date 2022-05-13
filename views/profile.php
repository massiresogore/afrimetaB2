<?php ob_start(); ?>

<h1>Mon profile</h1>

<?php $content =  ob_get_clean();
require "template.php"; ?>