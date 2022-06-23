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
                    <a class="nav__link" href="/profile" class="nav__link">Profile </a>
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
        <?= $contenu ?>
    </div>

    <!-- <footer id="footer" class="">
        <a class="footer__mail" href="mailto:masssire.org@gmail.com">massire.org@gmail.com</a>
        <ul class="social__list">
            <li class="social__list-item"><a href="" class="social__list-link"><i class="fa-brands fa-whatsapp"></i></a>
            </li>
            <li class="social__list-item">
                <a href="https://www.facebook.com/massiremsr/" class="social__list-link" target="_blank"
                    class="social__list-link"> <i class="fa-brands fa-facebook"></i></a>

            </li>
            <li class="social__list-item"><a href="https://github.com/massiresogore" class="social__list-link"><i
                        class="fa-brands fa-github"></i></a></li>
        </ul>
        <p>Conçu avec curiosité et motivation par Sogore Massire &copy; copyright </p>
    </footer> -->

</body>

</html>