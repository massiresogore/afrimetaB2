<?php ob_start(); ?>

<section class="section_accueil">
    <div class="bg-video">
        <video class="bg-video__content" autoplay muted loop>
            <source src="http://localhost/socialNetwork/asset/images/video/studen.mp4" type="video/mp4">
            <source src="http://localhost/socialNetwork/asset/images/video/studen.webm" type="video/webm">
            Votre navigateur ne support pas le fichier
        </video>
    </div>


    <main class="main-acueil">
        <header class="header">

            <p class="header__paragraph">
                Afrimeta Blog social pour les étudiant.
                et qui dit etudiant, dit également parcours, informations etc.
                grâce à cette plateforme, vous aurez la possiblilité de
                échangés des infomations entre etudiant , recevoir de l'aide si vous rencontrez des problèmes sur l'un de vos projets et biens plus encore !
                lors nh'ésitez plus,<a href="index.php?page=register" class="header__btn"> rejoingnez dès maintenant la communauté Afrimeta Blog social</a>
            </p>
            <a href="index.php?page=register" class="header__btn">Crée un compte</a>
            <i class="fa-solid fa-thumbs-up fa-2x"></i>
            <i class="fa-solid fa-comment"></i>
        </header>


    </main>

</section>

<?php $content =  ob_get_clean();
require "template.php"; ?>