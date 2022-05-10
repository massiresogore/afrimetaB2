<?php ob_start(); ?>
<?php


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// die;

?>
<main id="main">
    <header id="header">
        <h1 class="header__title">Afrimeta Network</h1>
        <p class="header__paragraph">
            Afrimeta Network est le réseau social des developpeurs.
            et qui dit developpeur, dit également code source!
            grâce à cette plateforme, vous aurez la possiblilité de faire des liens avec vos amis et proches developpeurs,
            échangés des codes sources, recevoir de l'aide si vous rencontrez des problèmes sur l'un de vos projets et biens plus encore !
        <div class="header__paragraph">alors nh'ésitez plus,<a href="index.php?page=register" class="header__btn-para"> rejoingnez dès maintenant la communauté Afrimeta Network</a></div>
        </p>
        <a href="index.php?page=register" class="header__btn">Crée un compte</a>
    </header>

    <i class="fa-solid fa-thumbs-up fa-5x"></i>
    <i class="fa-solid fa-comment"></i>
</main>


<?php $content =  ob_get_clean();
require "template.php"; ?>