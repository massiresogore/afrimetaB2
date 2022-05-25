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
                Avez besoin d'informations sur votre parcours scolaire ? Afrimeta Blog social est conçus pour vous les étudiants <i class="fa-solid fa-graduation-cap"></i>
                <a href="index.php?page=register" class="header__btn">Crée un compte</a>
                <i class="fa-solid fa-thumbs-up fa-2x"></i>
                <i class="fa-solid fa-comment"></i>
            </p>
        </header>


    </main>

</section>

<?php $content =  ob_get_clean();
require "template.php"; ?>