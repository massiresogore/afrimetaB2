<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reseau social pour developpeur">
    <meta name="author" content="Massire Sogore">
    <title>
        Afrimeta
    </title>
    <script src="http://localhost:8000/js/showMenuBar.js" defer></script>
    <link rel="stylesheet" href="http://localhost:8000/css/main.css">
    <script src="https://kit.fontawesome.com/a5cf1be0cd.js" crossorigin="anonymous" defer></script>
</head>

<body>
    <nav id="nav">
        <div class="logo-block">
            <a href="/"><img class="nav_logo" src="http://localhost:8000/images/logo/logWhite.svg" alt="logo"></a>
        </div>

        <button id="navBar">
            <span class="bar_1"></span>
            <span class="bar_2"></span>
            <span class="bar_3"></span>
        </button>
        <div class="nav__block">

            <ul class="nav__list">
                <li class="nav__item"><a class="nav__link" href="/" class="nav__link">Accueil </a></li>
                <li class="nav__item"><a class="nav__link" href="/listeDesMembres" class="nav__link">Listes
                        des Membres </a></li>

                <li class="nav__item">
                    <a class="nav__link" href="" class="nav__link">Profile </a>
                </li>

                <li class="nav__item">
                    <a class="nav__link" href="/publication" class="nav__link">Publications </a>
                </li>

                <li class="nav__item">

                    <a class="nav__link" href="" class="nav__link">Modifier mon
                        Profile </a>
                </li>
                <li class="nav__item">
                    <a class="nav__link" href="" class="nav__link">Deconnexion </a>
                </li>

                <li class="nav__item"><a href="" class="nav__link">Connexion </a></li>

                <li class="nav__item"><a class="nav__link" href="" class="nav__link">A propos </a></li>
                <li class="nav__item"><a class="nav__link" href="" class="nav__link">Contact </a></li>
            </ul>
        </div>
    </nav>

    <div id="block-main">
        <section class="section_accueil">
            <div class="bg-video">
                <video class="bg-video__content" autoplay muted loop>
                    <source src="http://localhost:8000/images/video/studen.mp4" type="video/mp4">
                    <source src="http://localhost:8000/images/video/studen.webm" type="video/webm">
                    Votre navigateur ne support pas le fichier
                </video>
            </div>
            <main class="main-acueil">
                <header class="header">
                    <p class="header__paragraph">
                        Vous êtes étudiant, et vous avez besoin d'informations sur votre parcours, ou <a
                            class="link-campus" href="https://www.campusfrance.org/fr" target="_blanc">sur <img
                                class="campusFrance" src="http://localhost:8000/images/logo/campusFrance.png"
                                alt="logo">Campus
                            France</a> ? Afrimeta est spécialement conçus
                        pour vous
                        <i class="fa-solid fa-graduation-cap"></i>
                    </p>
                    <figure id="cite-antaDiop">
                        <blockquote cite="cheick Anta Diop">
                            <p>
                                Formez vous, armez vous de sciences jusqu'au dents (...) et arrachez votre patrimoine
                                culturel.
                            </p>
                        </blockquote>
                        <figcaption>-Cheickh Anta Diop, <cite>historien, anthropologue, homme politique et
                                révolutionnaire
                                afrocentriste.</cite></figcaption>
                    </figure>
                </header>


                <div class="btn-block"><button class="header__btn-3d"><a class="btn-3d-link" href="/inscription">Crée
                            un
                            compte</a></button></div>
            </main>
        </section>
    </div>

</body>

</html>