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

    <script src="../../socialNetwork/asset/js/showMenuBar.js" defer></script>
    <link rel="stylesheet" href="http://localhost/socialNetwork/asset/css/main.css">
    <script src="https://kit.fontawesome.com/a5cf1be0cd.js" crossorigin="anonymous" defer></script>
</head>

<body>
    <nav id="nav">
        <div class="logo-block">
            <img class="nav_logo" src="http://localhost/socialNetwork/asset/images/logo/logo.svg" alt="logo">
        </div>

        <div class="nav__block">
            <button id="navBar">
                <span class="hamburger"></span>
            </button>

            <ul class="nav__list">
                <li class="nav__item"><a class="nav__link" href="index.php" class="nav__link">Accueil </a></li>
                <li class="nav__item"><a class="nav__link" href="index.php?page=listesMembres" class="nav__link">Listes des Membres </a></li>

                <?php if (isset($_SESSION["user"])) { ?>
                    <li class="nav__item">
                        <a class="nav__link" href="index.php?page=profile&id=<?= $_SESSION["user"]->getId()  ?>" class="nav__link">Profile </a>
                    </li>
                    <li class="nav__item">

                        <a class="nav__link" href="index.php?page=modifierProfile&id=<?= $_SESSION["user"]->getId() ?>" class="nav__link">Modifier mon Profile </a>
                        <?php ?>

                        <a class="nav__link" href="index.php?page=profile" class="nav__link">Profile </a>

                        <?php ?>

                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="index.php?page=deconnexion" class="nav__link">Deconnexion </a>
                    </li>
                <?php } else { ?>
                    <li class="nav__item"><a href="index.php?page=connexion" class="nav__link">Connexion </a></li>
                    <li class="nav__item"><a href="index.php?page=register" class="nav__link">Inscription </a></li>
                <?php } ?>
                <li class="nav__item"><a class="nav__link" href="" class="nav__link">A propos </a></li>
                <li class="nav__item"><a class="nav__link" href="" class="nav__link">Contact </a></li>
            </ul>
        </div>
    </nav>

    <div id="block-main">
        <?= $content ?>

    </div>

    <footer>

    </footer>
</body>

</html>