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
    <script src="https://kit.fontawesome.com/a5cf1be0cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/projetEcole/reseauSocial/asset/css/main.css">
</head>

<body>

    <nav class="nav">
        <div class="nav__block">
            <p class="nav__logo">Afrimeta</p>
        </div>
        <div class="nav__block">
            <ul class="nav__list">
                <li class="nav__item"><a href="index.php" class="nav__link">Accueil </a></li>

                <?php if (isset($_SESSION["id"])) { ?>
                    <li class="nav__item"><a href="" class="nav__link">Blog </a></li>
                    <li class="nav__item"><a href="index.php?page=deconnexion" class="nav__link">Donnexion </a></li>
                <?php } else { ?>
                    <li class="nav__item"><a href="index.php?page=connexion" class="nav__link">Connexion </a></li>
                    <li class="nav__item"><a href="index.php?page=register" class="nav__link">Inscription </a></li>
                <?php } ?>
                <li class="nav__item"><a href="" class="nav__link">A propos </a></li>
                <li class="nav__item"><a href="" class="nav__link">Contact </a></li>


            </ul>
        </div>
    </nav>


    </ /?php var_dump($_SESSION["id"]) ?>
    </ /?php var_dump($_COOKIE["email"]) ?>

    <?= $content ?>


    <footer>

    </footer>
</body>

</html>