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
                Avez vous besoin d'informations sur votre parcours scolaire ? Afrimeta Blog social est conçus pour vous
                les étudiants <i class="fa-solid fa-graduation-cap"></i>
            </p>
        </header>
    </main>


    <?php if (!isset($_SESSION["user"])) : ?>
    <div class="btn-block"><button class="header__btn-3d"><a class="btn-3d-link" href="index.php?page=register">Crée un
                compte</a></button></div>
    <?php endif ?>

</section>

<?php $content =  ob_get_clean();
require "template.php"; ?>