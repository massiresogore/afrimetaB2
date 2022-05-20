<?php ob_start(); ?>
<main id="main-connexion">



    <div class="book-connexion">

        <p class="erreurs">
            <?= isset(ConnexionModele::$message) ? ConnexionModele::$message : "" ?>
        </p>

        <form action="" method="POST" class="form-connexion" id="contactForm">
            <!-- email field -->
            <div class="form__group">
                <input class="input-connexion" type="email" name="email" id="email" autocomplete="off" placeholder="Email" required>
                <label for="email" class="form__label">Email</label>
            </div>

            <!-- password field -->
            <div class="form__group">
                <input class="input-connexion" type="password" name="password" id="password" autocomplete="off" placeholder="Mot de passe" required>
                <label for="password" class="form__label">Mot de passe </label>
            </div>

            <!-- Se souvenir de moi  -->
            <div>
                <label for="checkbox">Se souvenir de moi
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <a href="index.php?page=resetpassword">Mot de passe oublié</a>
                </label>
            </div>


            <!-- Submit -->
            <div class="form__group">
                <input class="input-connexion" type="submit" value="connexion" name="connexion" class="form__submit">
            </div>
        </form>
    </div>
</main>


<?php $content =  ob_get_clean();
require "template.php"; ?>