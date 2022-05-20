<?php ob_start(); ?>

<h1>Connexion</h1>

<main id="main">

    <p class="erreurs">
        <?= isset(ConnexionModele::$message) ? ConnexionModele::$message : "" ?>
    </p>

    <form action="" method="POST" class="form" id="contactForm">
        <!-- email field -->
        <div class="form__group">
            <input class="input" type="email" name="email" id="email" value="sogoremassire.fr@gmail.com" placeholder="Email" required>
            <label for="email" class="form__label">Email</label>
        </div>

        <!-- password field -->
        <div class="form__group">
            <input class="input" type="password" name="password" value="azerty" id="password" placeholder="" required>
            <label for="password" class="form__label">Mot de passe </label>
        </div>

        <!-- Se souvenir de moi  -->
        <div class="form__group">
            <label for="checkbox" class="form__label">Se souvenir de moi
                <input class="input" type="checkbox" name="checkbox" id="checkbox">
            </label>
            <a href="index.php?page=resetpassword">Mot de passe oublié</a>
        </div>


        <!-- Submit -->
        <div class="form__group">
            <input class="input" type="submit" value="connexion" name="connexion" class="form__submit">
        </div>
    </form>

</main>


<?php $content =  ob_get_clean();
require "template.php"; ?>