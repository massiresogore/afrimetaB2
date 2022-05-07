<?php ob_start(); ?>

<main id="main">
    <h1>Devenir Membre !!!</h1>

    <p class="erreurs">
        <?= isset(RegisterModele::$message) ?  RegisterModele::$message : "" ?>
    </p>
    <form action="" method="post" class="form">


        <!-- Name field -->
        <div class="form__group">
            <label for="name" class="form__label">Nom</label>
            <input type="text" name="name" id="name" required>
        </div>

        <!-- pseudo field -->
        <div class="form__group">
            <label for="pseudo" class="form__label">pseudo</label>
            <input type="text" name="pseudo" id="pseudo" required>
        </div>

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

        <!-- password Confirmation -->
        <div class="form__group">
            <label for="password_confirm" class="form__label">Confirmer votre mot de passe </label>
            <input type="password" name="password_confirm" id="password_confirm" required>
        </div>

        <!-- password Confirmation -->
        <div class="form__group">
            <input type="submit" value="Inscription" name="register" class="fom__submit">
        </div>

    </form>

</main>

<?php $content =  ob_get_clean();
require "template.php"; ?>