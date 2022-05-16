<?php ob_start(); ?>

<main id="main">
    <h1>Devenir Membre !!!</h1>

    <p class="erreurs">
        <?= isset(RegisterModele::$message) ?  RegisterModele::$message : "" ?>
    </p>
    <form action="" method="post" class="form" id="contactForm">

        <!-- Name field -->
        <div class="form__group">
            <label for="name" class="form__label ">Nom</label>
            <input type="text" name="name" value="massire" id="name" required>
        </div>

        <!-- pseudo field -->
        <div class="form__group">
            <label for="pseudo" class="form__label">pseudo</label>
            <input type="text" name="pseudo" value="sogore" id="pseudo" required>
        </div>

        <!-- email field -->
        <div class="form__group">
            <label for="email" class="form__label">Email</label>
            <input type="email" name="email" value="sogoremassire.fr@gmail.com" id="email" required>
        </div>

        <!-- password field -->
        <div class="form__group">
            <label for="password" class="form__label">Mot de passe </label>
            <input type="password" value="123456" name="password" id="password" required>
        </div>

        <!-- password Confirmation -->
        <div class="form__group">
            <label for="password_confirm" class="form__label">Confirmer votre mot de passe </label>
            <input type="password" value="123456" name="password_confirm" id="password_confirm" required>
        </div>

        <!-- submit  -->
        <div class="form__group">
            <input type="submit" value="Inscription" name="register" class="fom__submit">
        </div>

    </form>

</main>

<?php $content =  ob_get_clean();
require "template.php"; ?>