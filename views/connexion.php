<?php ob_start(); ?>

<h1>Connexion</h1>

<main id="main">


    <p class="erreurs">
        <?= isset(ConnexionModele::$message) ? ConnexionModele::$message : "" ?>
    </p>
    <form action="" method="POST" class="form">
        <!-- email field -->
        <div class="form__group">
            <label for="email" class="form__label">Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <!-- password field -->
        <div class="form__group">
            <label for="password" class="form__label">Mot de passe </label>
            <input type="password" name="password" id="password" required>
        </div>

        <!-- Submit -->
        <div class="form__group">
            <input type="submit" value="Inscription" name="connexion" class="fom__submit">
        </div>
    </form>

</main>


<?php $content =  ob_get_clean();
require "template.php"; ?>